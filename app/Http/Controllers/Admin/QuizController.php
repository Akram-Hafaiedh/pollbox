<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\User;
use Illuminate\View\View;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $quizzes = Quiz::where('has_correct_answers', true)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function topQuizzes(): View
    {
        // $topUsers = User::with(['quizzes' => function ($query) {
        //     $query->where('has_correct_answers', true)
        //         ->orderBy('score', 'desc')
        //         ->take(3);
        // }])->get();


        $topQuizzes = Quiz::where('has_correct_answers', true)
            ->orderBy('score', 'desc') // Replace with the actual column
            ->take(3)
            ->get();
        // dd($topQuizzes);
        return view('admin.quizzes.top-quizzes', compact('topQuizzes'));
    }
}
