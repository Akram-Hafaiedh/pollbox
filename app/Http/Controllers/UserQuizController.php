<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // Logic for listing available quizzes for the user

        $user = auth()->user();
        $quizzes = $user->quizzes;
        return view('user.quizzes.index', compact('quizzes', 'user'));
    }

    public function access(Quiz $quiz) : View
    {

        if($quiz->visibility === 'private'){

            $invitation = $quiz->invitation;
            dd($invitation);

            return view('user.quizzes.access', compact('quiz'));
        };
        return view('user.quizzes.show', compact('quiz'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz) : View
    {
        // Logic for showing details of a specific quiz for the user
        $quiz->load('questions.options');
        return view('user.quizzes.show', compact('quiz'));
    }

    public function submitResponse($quizId) : RedirectResponse
    {
        // Logic for submitting quiz responses

        $validatedData = request()->validate([
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.option_id' => 'required|exists:options,id',
        ]);
        dd($validatedData);

        // auth()->user()->quizResponses()->createMany($validatedData['responses']);

        return redirect()->route('user.quizzes.index')->with('success', 'Quiz responses submitted successfully!');
    }


}
