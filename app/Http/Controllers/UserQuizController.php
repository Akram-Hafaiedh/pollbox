<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitQuizRequest;
use App\Http\Resources\QuizResource;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\Response;
use App\Models\UserQuizState;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserQuizController extends Controller
{

    public function dashboard()
    {
        $latestQuizzes = Quiz::latest()->take(6)->get(); // Get the latest 5 quizzes

        return view('user.dashboard', compact('latestQuizzes'));
    }

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
            dd('api');
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
        } else {
            if ($this->hasAlreadySubmittedResponses($user, $quiz)) {
                return redirect()->back()
                    ->with('error', 'You have already submitted all responses for this quiz.');
            }

            return view('user.quizzes.show', compact('quiz'));
        }
    }

    private function hasAlreadySubmittedResponses($user, $quiz): bool
    {
        return $user->responses()
            ->where('quiz_id', $quiz->id)
            ->count() === $quiz->questions->count();
    }


    public function submitQuiz(Quiz $quiz, SubmitQuizRequest $request): RedirectResponse
    {
        $user = auth()->user();
        if ($this->hasAlreadySubmittedResponses($user, $quiz)) {
            return redirect()->back()
                ->with('error', 'You have already submitted all responses for this quiz.');
        }

        $questionResponses = $request->validated()['questions'];

        $questionCount = $quiz->questions()->count();
        $submittedResponseCount = count($questionResponses);

        DB::beginTransaction();

        try {
            if ($submittedResponseCount === $questionCount) {
                UserQuizState::updateOrCreate(
                    ['user_id' => auth()->user()->id, 'quiz_id' => $quiz->id],
                    ['state' => 'completed']
                );
            } else {
                UserQuizState::updateOrCreate(
                    ['user_id' => auth()->user()->id, 'quiz_id' => $quiz->id],
                    ['state' => 'in_progress']
                );
            }

            foreach ($questionResponses as $questionId => $response) {
                if (isset($response['selected_option'])) {
                    Response::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'question_id' => $questionId,
                            'quiz_id' => $quiz->id,
                        ],
                        [
                            'option_id' => $response['selected_option'],
                        ]
                    );
                } elseif (isset($response['rankings'])) {
                    foreach ($response['rankings'] as $optionId => $rank) {
                        Response::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'question_id' => $questionId,
                                'option_id' => $optionId,
                                'quiz_id' => $quiz->id,
                            ],
                            [
                                'ranking' => $rank,
                            ]
                        );
                    }
                } elseif (isset($response['selected_options'])) {
                    foreach ($response['selected_options'] as $optionId) {
                        Response::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'question_id' => $questionId,
                                'option_id' => $optionId,
                                'quiz_id' => $quiz->id,
                            ],
                            [
                                'selected' => true,
                            ]
                        );
                    }
                } elseif (isset($response['answer'])) {
                    Response::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'question_id' => $questionId,
                            'quiz_id' => $quiz->id,
                        ],
                        [
                            'answer' => $response['answer'],
                        ]
                    );
                } elseif (isset($response['scale_value'])) {
                    Response::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'question_id' => $questionId,
                            'quiz_id' => $quiz->id,
                        ],
                        [
                            'likert_scale' => $response['scale_value'],
                        ]
                    );
                }
            }

            DB::commit();
            // Redirect to the results page
            return redirect()->route('user.quizzes.results', $quiz)
                ->with('success', 'Quiz responses submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            // Redirect to the results page
            return redirect()->route('user.quizzes.results', $quiz)
                ->with('error', 'An error occurred while saving responses!');
        }
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

    public function history(Request $request): View
    {
        $state = $request->input('state');
        // dd('history');
        $user = auth()->user();
        $quizzes = $user->responses()
            ->with('quiz')
            ->get()
            ->pluck('quiz')
            ->unique('id')
            ->filter();

        return view('user.quizzes.history', compact('user', 'quizzes','state'));
    }
    public function filter(Request $request)
    {
        $state = $request->input('quiz-state');
        if ($state === "all") {
            return redirect()->route('user.quizzes.history');
        }
        $user = auth()->user();

        $quizzes = $user->userquizstates()
            ->where('state', $state)
            ->get()
            ->pluck('quiz')
            ->unique('id');

        return view('user.quizzes.history', compact('user', 'quizzes','state'));
    }
}
