<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function switchLanguage($locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }

    public function index()
    {
        if (Auth::check()) {
            $users = User::where('phone', Auth::user()->phone)->get();
        }

        return view('admin.dashboard', compact('users'));
    }

    public function dashboardSale()
    {
        return view('admin.dashboard-sale');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
