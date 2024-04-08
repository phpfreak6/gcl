<?php

namespace App\Repositories;

use App\User;
use App\FavoriteCountry;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version March 19, 2020, 11:14 am UTC
 */

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function createUser($input)
    {
        $input['password'] = Hash::make('password');
        $user = User::create($input);
        $user->assignRole(2);
        return $user;
    }

    public function updateUser($request, $user)
    {
        if ($request->has('password') && $request->password != null) {
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        } else {
            $input = $request->except(['password', 'password_confirmation']);
        }

        $user->fill($input);
        $user->save();
        // $user->roles()->detach();
        // $user->assignRole(2);


        FavoriteCountry::where('user_id', $user->id)->delete();

        if ($user->id &&  $request->Favcountries) {

            $favCountries =  $request->Favcountries;


            foreach ($favCountries as $country) {
                FavoriteCountry::create([
                    'user_id' => $user->id,
                    'country_name' => $country,
                ]);
            }
        }
        return $user;
    }

    public function updateUserProfile($request, $user)
    {
        $input = $request->all();

        if ($request->has('password') && $request->password != null)
            $input['password'] = Hash::make($request->password);
        else
            $input = $request->except(['password', 'password_confirmation']);

        if ($request->has('image')) {
            $input['image'] = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('dist/img'), $input['image']);
        }
        $user->fill($input);
        $user->save();

        return $user;
    }
}
