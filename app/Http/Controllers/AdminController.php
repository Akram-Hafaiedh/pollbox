<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    //

    public function index(): View
    {
        // dd(auth()->user()->role);
        $adminUser = auth()->user();
        $users = User::where('role', 'user')->get();
        $quizzes = $adminUser->quizzes;
        // dd($quizzes);

        return view('admin.dashboard', compact('users', 'quizzes', 'adminUser'));
    }
}
