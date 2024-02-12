<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Response;
use App\Models\User;
use App\Models\UserQuizState;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminReportsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function reports()
    {
        return view('admin.reports.dashboard');
    }


    public function showQuizMetrics(Request $request): View
    {


        $start_date_filter = request()->get('start_date_filter');
        $end_date_filter = request()->get('end_date_filter');
        $title_filter = request()->get('title_filter');

        $request->session()->flashInput($request->all());

        $query = Quiz::query();

        if ($start_date_filter) {
            $query->where('start_date', '>=', $start_date_filter);
        }
        if ($end_date_filter) {
            $query->where('end_date', '<=', $end_date_filter);
        }

        if ($title_filter) {
            $query->where('title', 'LIKE', '%' . $title_filter . '%');
        }
        $quizzes = $query->paginate(15);


        return view('admin.reports.quiz_metrics', compact('quizzes'));
    }

    public function showParticipationMetrics(): View
    {

        return view('admin.reports.quiz_participation_metrics');
    }
    public function showUserMetrics(): View
    {
        $totalUsers = User::count();
        $activeUsers = User::where('last_login_at', '>=', Carbon::now()->subDays(7))->where('admin_id', Auth::id())->count(); // Example for users active in the last 7 days
        $newUsers = User::where('created_at', '>=', Carbon::now()->subMonth())->count(); // Example for users registered in the last month
        $userMetrics = [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'newUsers' => $newUsers,
        ];
        return view('admin.reports.user_metrics', compact('userMetrics'));
    }

    public function showQuestionMetrics(): View
    {

        $totalQuestions = Question::count();
        $questionsPerType = Question::select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->orderBy('total', 'desc')
            ->get();
        $averageQuestionsPerDay = Question::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->limit(30)
            ->get()
            ->average('total');
        $newQuestionsThisMonth = Question::whereBetween('created_at', [now()->startOfMonth(), now()])
            ->count();

        $questionMetrics = [
            'totalQuestions' => $totalQuestions,
            'questionsPerType' => $questionsPerType,
            'averageQuestionsPerDay' => $averageQuestionsPerDay,
            'newQuestionsThisMonth' => $newQuestionsThisMonth,
        ];


        return view('admin.reports.question_metrics', compact('questionMetrics'));
    }

    public function showUserParticipationMetrics(): View
    {

        return view('admin.reports.user_participation_metrics');
    }

    public function showQuizParticipationMetrics(): View
    {
        return view('admin.reports.quiz_participation_metrics');
    }
    public function showQuestionParticipationMetrics(): View
    {

        return view('admin.reports.question_participation_metrics');
    }

    public function display(): View
    {
        // dd('test');
        $quizzes = Quiz::paginate(15);
        return view('admin.reports.display', compact('quizzes'));
    }

    public function show(Quiz $quiz): View
    {
        $data = $this->getReportdata($quiz);

        $charts = [];
        foreach ($quiz->questions as $index => $question) {
            $options = [];
            $questionResponseCounts = [];
            $responses = Response::where('question_id', $question->id)->get();
            foreach ($question->options as $option) {
                $optionResponseCount = $responses->where('option_id', $option->id)->count();
                $options[] = $option->content;
                $questionResponseCounts[] = $optionResponseCount;
            }

            $chartData = [
                'labels' => $options, // Assuming fixed options for all questions
                'datasets' => [
                    [
                        'label' => 'Responses for Question ' . $index + 1,
                        'data' => $questionResponseCounts,
                        'backgroundColor' => [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        'borderColor' => [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        'borderWidth' => 1
                    ]
                ]
            ];


            $charts[] = $chartData;
        }

        return view('admin.reports.quiz', $data + compact('charts'));
    }
    public function userReport(User $user, Quiz $quiz): View
    {
        $data = $this->getReportData($quiz, $user);
        return view('admin.reports.user_quiz', $data);
    }

    public function getReportdata(Quiz $quiz, User $user = null): array
    {
        $quizData = $quiz->load(['questions', 'responses', 'questions.options']);
        $statistics = [];


        $statistics['total_questions'] = $quizData->questions->count();
        $statistics['total_responses'] = Response::where('quiz_id', $quiz->id)->distinct('user_id')->count();
        $statistics['total_completion_rate'] = ($statistics['total_questions'] > 0) ? (($statistics['total_responses'] / $statistics['total_questions']) * 100) : 0;
        $statistics['participants'] = UserQuizState::where('quiz_id', $quiz->id)->distinct('user_id')->get()->map(function ($userQuizState) {
            return [
                'user' => $userQuizState->user,
                'userQuizState' => $userQuizState
            ];
        });
        // dd($statistics['participants']);
        if ($user) {
            $userResponses = $user->responses()->where('quiz_id', $quiz->id)->get();
            $statistics['user_responses'] = $userResponses->count();
            $statistics['user_completion_rate'] = ($statistics['total_questions'] > 0) ? (($statistics['user_responses'] / $statistics['total_questions']) * 100) : 0;
        }
        return [
            'quiz' => $quizData,
            'user' => $user ?? null,
            'statistics' => $statistics,
            // 'responses' => Response::where('quiz_id', $quiz->id)->get(),
        ];
    }
}
