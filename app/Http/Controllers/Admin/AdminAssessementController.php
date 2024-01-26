<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminAssessementController extends Controller
{
    public function index( Request $request) : View
    {
        $search = $request->get('search');

        $assessements = Quiz::where('type', 'assessement')->paginate(10);
        return view('admin.assessements.index', compact('assessements','search'));
    }
}
