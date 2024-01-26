<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminExamController extends Controller
{
    public function index( Request $request ) : View
    {
        $search = $request->get('search');
        $exams = Quiz::where('type', 'exam')->paginate(10);
        return view('admin.exams.index', compact('search', 'exams'));
    }
}
