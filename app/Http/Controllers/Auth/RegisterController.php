<?php

namespace App\Http\Controllers\Auth;

use App\FavoriteCountry;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Role;
use App\Models\PaymentMethod;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $countries = Country::all();
        $payment_methods = PaymentMethod::all()->where('name', '!=', 'No Payment');
        return view('auth.register', compact('countries', 'payment_methods'));
    }

    public function showOrganizationForm()
    {
        $countries = Country::all();
        return view('auth.organization', compact('countries'));
    }

    public function showContactForm()
    {
        // $countries = Country::all();
        return view('auth.contact');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required'],
            'payment_method_id' => ['required'],
        ]);

        // Concatenate first name and last name for generating user code
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $userCode = $this->generateUniqueCode($firstName, $lastName);

        // Add the user code to the user data
        $userData = $request->all();
        $userData['user_code'] = "SH-" . $userCode;

        // Save user data in the session
        $request->session()->put('user_data', $userData);

        return $this->registered($request, $userData)
            ?: redirect('/organization');
    }

    // Function to generate a unique user code
    private function generateUniqueCode($firstName, $lastName)
    {
        // Concatenate first name and last name without spaces
        $combinedName = str_replace(' ', '', $firstName . $lastName);

        // Generate the initial code using the first 6 characters of the combined name
        $userCode = substr($combinedName, 0, 6);

        // Check if the code already exists in the database
        while (\App\User::where('user_code', $userCode)->exists()) {
            // If it exists, remove characters from the right and add a serial number
            $userCode = $this->incrementCode($userCode);
        }

        return $userCode;
    }

    // Function to increment the code by adding a serial number
    private function incrementCode($code)
    {
        // Extract the numeric part of the code
        preg_match('/(\d+)$/', $code, $matches);

        // If there is a numeric part, increment it; otherwise, add '1'
        $serialNumber = isset($matches[1]) ? $matches[1] + 1 : 1;

        // Append the incremented serial number to the code
        return $code . $serialNumber;
    }

    public function organization(Request $request)
    {
        if (!$request->session()->get('user_data')) {
            return redirect('/register')->with('error', 'Please log in to access this page.');
        }
        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
            'address_1' => ['required'],
            'city' => ['required'],
            'postal' => ['required'],
            'country' => ['required', 'string'],
        ]);

        // Combine user data from the request with existing session data, if any
        $userData = array_merge($request->all(), $request->session()->get('user_data', []));

        // Save the combined user data in the session
        $request->session()->put('user_and_org_data', $userData);

        return redirect('/contactdetails')->with('success', 'Profile updated successfully!');
    }

    public function contact(Request $request)
    {
        if (!$request->session()->get('user_and_org_data')) {
            return redirect('/register')->with('error', 'Please log in to access this page.');
        }
        $request->validate([
            'contact_first_name' => ['required', 'string', 'max:255'],
            'contact_last_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_phone_no' => ['required'],
        ]);

        // Combine user data from the request with existing session data, if any
        $userData = array_merge($request->all(), $request->session()->get('user_and_org_data', []));

        $user = $this->create($userData);

        if ($user->id) {

            if (!empty($userData['Favcountries'])) {
                $favCountries = $userData['Favcountries'];

                foreach ($favCountries as $country) {
                    FavoriteCountry::create([
                        'user_id' => $user->id,
                        'country_name' => $country,
                    ]);
                }
            }
        }

        event(new Registered($user));

        return $this->registered($request, $user)
            ?: redirect('/thankyou');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, []);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'user_code' => $data['user_code'],
            'last_name' => $data['last_name'],
            'contact_first_name' => $data['contact_first_name'],
            'contact_last_name' => $data['contact_last_name'],
            'email' => $data['email'],
            'contact_email' => $data['contact_email'],
            'password' => Hash::make($data['password']),
            'company_name' => $data['company_name'],
            'address_1' => $data['address_1'],
            'address_2' => $data['address_2'],
            'phone_no' => $data['phone_no'],
            'contact_phone_no' => $data['contact_phone_no'],
            'registration_no' => $data['registration_no'],
            'industry' => $data['industry'],
            // 'business_location' => $data['business_location'],
            // 'vat' => $data['vat'],
            // 'town' => $data['town'],
            'city' => $data['city'],
            'postal' => $data['postal'],
            'country' => $data['country'],
            'payment_method_id' => $data['payment_method_id'],
            'active' => 0,
        ]);
        $role = Role::find(2);
        $user->assignRole($role->name);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        Session::flash('success', 'Success! You have registered, your account is under review!');
    }
}
