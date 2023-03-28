<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User();
        User::validate($request);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setPassword($Hash::make($request->input('password')));
        $user->setPostalCode($request->input('postalCode'));
        $user->setCountry($request->input('country'));
        $user->setPoints($request->input('points'));
        $user->save();
        if ($request->hasFile('photo')) {
            $imageName = $user->getId().".".$request->file('photo')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('photo')->getRealPath())
            );
            $user->setPhoto($imageName);
            $user->save();
        }
        
        }
    }
}
