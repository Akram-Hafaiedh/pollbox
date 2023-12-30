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
        if ($request->is('api/*')) {

            return QuizResource::collection($quizzes);
        } else {

            return view('user.quizzes.index', compact('quizzes', 'user', 'visibilityFilter'));
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
        $user = auth()->user();
        $quiz->load('questions.options');
        if ($request->is('api/*')) {

            return new QuizResource($quiz);
        } else {    // Check if the user has already submitted responses for this quiz
            // $hasSubmittedResponses = auth()->user()->responses()->where('quiz_id', $quiz->id)->exists();
            // Check if the user has submitted responses for all the questions
            $hasSubmittedResponses = $user->responses()
                ->where('quiz_id', $quiz->id)
                ->count() === $quiz->questions->count();

            // If the user has submitted responses, redirect them away
            if ($hasSubmittedResponses) {
                return redirect()->route('user.quizzes.index')
                    ->with('error', 'You have already responded to this quiz.');
            }

            return view('user.quizzes.show', compact('quiz'));
        }
    }

    public function submitQuiz(Quiz $quiz, Request $request): RedirectResponse
    {
        $user = auth()->user();

        // $existingResponses = auth()->user()->responses()->where('quiz_id', $quiz->id)->exists();
        $hasSubmittedResponses = $user->responses()
            ->where('quiz_id', $quiz->id)
            ->count() === $quiz->questions->count();
        if ($hasSubmittedResponses) {
            return redirect()->back()
                ->with('error', 'You have already submitted all responses for this quiz.');
        }

        // validation rules
        $rules = [];
        foreach ($quiz->questions as $question) {
            $rules["responses.{$question->id}"] = 'nullable|exists:options,id';
        }
        $request->validate($rules);
        // validation Ok
        // Store response
        $userResponses = $request->input('responses');
        // dd($userResponses);

        foreach ($userResponses as $questionId => $optionId) {
            // $selectedOption = Option::findOrFail($optionId);
            $existingResponse = $user->responses()
                ->where('quiz_id', $quiz->id)
                ->where('question_id', $questionId)
                ->first();
            if ($existingResponse) {
                // Update the existing response
                $existingResponse->update(['user_response' => $optionId]);
            } else {
                // Create a new response
                $user->responses()->create([
                    'quiz_id' => $quiz->id,
                    'question_id' => $questionId,
                    'user_response' => $optionId,
                ]);
            }
        }

        // TODO: Calculate the score


        // Redirect to the results page
        return redirect()->route('user.quizzes.results', $quiz)
            ->with('success', 'Quiz responses submitted successfully!');
    }
    public function showResults(Quiz $quiz): View
    {

        $user = auth()->user();
        $quiz->load('questions.options');
        // dd($quiz,$quiz->questions);
        $userResponses = $user->responses()->where('quiz_id', $quiz->id)->get();
        // dd( $userResponses);

        // Fetch user's responses and correct answers
        // Display results

        // return score if we want to
        return view('user.quizzes.summary', compact('quiz', 'userResponses'));
    }

    public function history(): View
    {
        // dd('history');
        $user = auth()->user();

        $quizzes = $user->responses->map(function ($response) {
            return $response->quiz;
        })->unique();
        return view('user.quizzes.history', compact('user', 'quizzes'));
    }
}
