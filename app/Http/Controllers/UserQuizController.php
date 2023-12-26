<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\View\View;

class UserQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View | JsonResource
    {
        // Logic for listing available quizzes for the user
        $user = auth()->user();
        $quizzes = $user->quizzes;
        $invitations = $user->invitations;

        if ($request->is('api/*')) {

            return QuizResource::collection($quizzes);

            // return response()->json($quizzes, 200);
        } else {

            return view('user.quizzes.index', compact('quizzes', 'user'));
        }
    }

    public function access(Quiz $quiz): View
    {

        if ($quiz->visibility === 'private') {

            $invitation = $quiz->invitation;
            dd($invitation);

            return view('user.quizzes.access', compact('quiz'));
        };
        return view('user.quizzes.show', compact('quiz'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, Quiz $quiz): View | JsonResource
    {
        $quiz->load('questions.options');
        if ($request->is('api/*')) {

            return new QuizResource($quiz);
        } else {

            return view('user.quizzes.show', compact('quiz'));
        }
    }

    public function submitResponse($quizId): RedirectResponse
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
