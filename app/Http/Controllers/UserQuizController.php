<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceResponse;
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
    public function show(Request $request, Quiz $quiz): View | JsonResource | RedirectResponse
    {
        $quiz->load('questions.options');
        if ($request->is('api/*')) {

            return new QuizResource($quiz);
        } else {    // Check if the user has already submitted responses for this quiz
            $hasSubmittedResponses = auth()->user()->quizResponses()->where('quiz_id', $quiz->id)->exists();

            // If the user has submitted responses, redirect them away
            if ($hasSubmittedResponses) {
                return redirect()->route('user.quizzes.index')->with('error', 'You have already responded to this quiz.');
            }


            return view('user.quizzes.show', compact('quiz'));
        }
    }

    public function submitQuiz(Quiz $quiz, Request $request): RedirectResponse
    {

        $existingResponses = auth()->user()->quizResponses()->where('quiz_id', $quiz->id)->exists();
        if ($existingResponses) {
            return redirect()->back()->with('error', 'You have already submitted responses for this quiz.');
        }

        // validation rules
        $rules = [];
        foreach ($quiz->questions as $question) {
            $rules["responses.{$question->id}"] = 'required|exists:options,id';
        }
        $request->validate($rules);
        // validation Ok
        // Store response
        $userResponses = $request->input('responses');
        // dd($userResponses);

        foreach ($userResponses as $questionId => $optionId) {
            // $selectedOption = Option::findOrFail($optionId);
            Response::create([
                'user_id' => auth()->id(),
                'quiz_id' => $quiz->id,
                'question_id' => $questionId,
                'user_response' => $optionId,
                // 'user_response' => $selectedOption->content,
            ]);
        }

        // TODO: Calculate the score


        // Redirect to the results page
        return redirect()->route('user.quizzes.results',$quiz)
        ->with('success', 'Quiz responses submitted successfully!');;
    }
    public function showResults(): View
    {

        dd('Results');

        // Fetch user's responses and correct answers
        // Display results
        return view('user.quizzes.results', compact('userResponses', 'score'));
    }
}
