<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserNotificationSettings;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required'],
            'phone' => ['required', 'numeric', 'digits_between:5,20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['password']),
        ]);

        $this->createWallet($user);

        UserNotificationSettings::create([
            'user_id' => $user->id
        ]);

        return $user;
    }

    /**
     * Create a new wallet after a valid registration.
     *
     * @param  User $user
     */
    protected function createWallet(User $user)
    {
        $wallet = $user->createWallet([
            'name'      => 'Litecoin',
            'slug'      => 'ltc-'.$user->generateRandomString(34),
            'image'     => 'images/ltc.png',
            'meta'      => ['currency' => 'LTC'],
        ]);

        $wallet = $user->createWallet([
            'name'      => 'USDT',
            'slug'      => 'usdt-'.$user->generateRandomString(42),
            'image'     => 'images/usdt.png',
            'meta'      => ['currency' => 'USDT'],
        ]);
    }
}
