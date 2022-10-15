<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{

    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('dologout');
    }

    // validating normal user registration form data
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ]);
    }
    // registering normal user here

    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $reg_response = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($reg_response) {
            return redirect()->intended('user/login')->with('reg_msg', 'user Registration Successful');
        } else {
            return redirect()->intended('user/register')->with('reg_msg', 'user Registration failed');
        }
    }
    // login function for normal user

    protected function dologin(Request $request)
    {

        //validating user email and password for authentication

        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ],

        );
        $check = $request->only('email', 'password');

        // attemp for login
        if (Auth::guard('web')->attempt($check)) {

            $request->session()->regenerate();

            return redirect()->route('user.home');
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
            return redirect()->route('user.login')->with('login_msg', 'invalid Credentials');
        }
    }
    protected function dologout(Request $request)
    {
        // print_r($request);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        // $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route('user.home');
    }
}
