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
        $visibilityFilter = $request->query('visibility', 'all');
        $publicQuizzes = Quiz::where('visibility', 'public')->get();
        $receivedQuizzes = $user->receivedInvitation->map(function ($invitation) {
            return $invitation->quiz;
        });
        $userAdminPrivateQuizzes = $user->admin->quizzes()->where('visibility', 'private')->get();
        $quizzes = $publicQuizzes->merge($receivedQuizzes)->merge($userAdminPrivateQuizzes)->unique();

        // dd($publicQuizzes, $receivedQuizzes, $userAdminPrivateQuizzes, $quizzes);
        if($request->is('api/*')){

            return QuizResource::collection($quizzes);
        }else{

            return view('user.quizzes.index', compact('quizzes', 'user','visibilityFilter'));
        }

    }

    public function access(Quiz $quiz): View
    {

        // if ($quiz->visibility === 'private') {

        //     $invitation = $quiz->invitation;
        //     // dd($invitation);

        //     return view('user.quizzes.access', compact('quiz'));
        // };
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

    public function submitQuiz($quizId): RedirectResponse
    {
        // Logic for submitting quiz responses

        // Validate and store user responses
        $validatedData = request()->validate([
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.option_id' => 'required|exists:options,id',
        ]);
        dd($validatedData);


        // Calculate the score


        // auth()->user()->quizResponses()->createMany($validatedData['responses']);
        // return redirect()->route('user.quizzes.insdex')->with('success', 'Quiz responses submitted successfully!');

        // Redirect to the results page
        return redirect()->route('quiz.results')
        ->with('success', 'Quiz responses submitted successfully!');;
    }
    public function showResults(): View
    {

        // Fetch user's responses and correct answers
        // Display results
        return view('quiz.results', compact('userResponses', 'score'));
    }
}
