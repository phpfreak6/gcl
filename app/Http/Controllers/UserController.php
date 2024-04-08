<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\Models\Country;
use App\FavoriteCountry;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ProfileUserRequest;
use App\Models\PaymentMethod;

class UserController extends Controller
{
    /** @var  UserRepository */
    private $UserRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the SystemUser.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {


        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new SystemUser.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('users.create', compact('countries'));
    }

    /**
     * Store a newly created SystemUser in storage.
     *
     * @param CreateSystemUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->createUser($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified SystemUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified SystemUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $countries = Country::all();
        $favcountries = FavoriteCountry::where('user_id', $id)->pluck('country_name')->toArray();
        $payment_methods = PaymentMethod::all();


        return view('users.edit', [
            'user' => $user,
            'countries' => $countries,
            'favcountries' => $favcountries,
            'payment_methods' => $payment_methods
        ]);
    }

    /**
     * Update the specified SystemUser in storage.
     *
     * @param  int              $id
     * @param UpdateSystemUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->updateUser($request, $user);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    // Get User Profile
    public function user_profile($id)
    {
        if (Auth::user()->id != $id)
            return abort(404);

        $user = $this->userRepository->find($id);

        $countries = Country::all();
        return view('users.profile', [
            'user' => $user,
            'countries' => $countries
        ]);
    }
    // Update User Profile
    public function update_user_profile($id, ProfileUserRequest $request)
    {
        if (Auth::user()->id != $id)
            return abort(404);

        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect()->back();
        }

        $user = $this->userRepository->updateUserProfile($request, $user);

        Flash::success('Profile updated successfully.');
        return redirect()->back();
    }
}
