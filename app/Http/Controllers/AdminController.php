<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    //

    public function index(): View
    {
        // dd(auth()->user()->role);

        $users = User::where('role', 'user')->get();

        return view('admin.dashboard', compact('users'));
    }
}
