<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{

    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('dologout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ]);
    }

    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $reg_response = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($reg_response) {
            return redirect()->intended('admin/login')->with('reg_msg', 'Admin Registration Successful');
        } else {
            return redirect()->intended('admin/register')->with('reg_msg', 'Admin Registration failed');
        }
    }
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
        if (Auth::guard('admin')->attempt($check)) {

            $request->session()->regenerate();

            return redirect()->route('admin.home');
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
            return redirect()->route('admin.login')->with('login_msg', 'invalid Credentials');
        }
    }

    protected function dologout(Request $request)
    {

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.home');
    }
}
