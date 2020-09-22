<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return $this->showLoginForm();
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('phone', $credentials['phone'])->first();
            $role = $user->role;
            switch ($role) {
                case config('roles.admin'):
                    $admin = 'Admin';
                    return redirect()->route('admin.dashboard', compact('admin'))
                        ->with('success', trans('messages.login_success'));
                    break;
                case config('roles.sale'):
                    return redirect()->route('admin.dashboard_sale');
                    break;
            }
        } else {
            $this->sendFailedLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'phone';
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login')->with('success', trans('messages.logout_success'));
    }
}
