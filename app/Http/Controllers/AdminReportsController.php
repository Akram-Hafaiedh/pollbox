<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Response;
use App\Models\User;
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


    public function showQuizMetrics () : View
    {


        $quizzes = Quiz::paginate(15);

        // $quizzes->laod('options');

        return view('admin.reports.quiz_metrics', compact('quizzes'));
    }

    public function showParticipationMetrics() : View
    {

        return view('admin.reports.quiz_participation_metrics');

    }
    public function showUserMetrics() : View
    {
        $totalUsers = User::count();
        $activeUsers = User::where('last_login_at', '>=', Carbon::now()->subDays(7))->where('admin_id', Auth::id())->count(); // Example for users active in the last 7 days
        $newUsers = User::where('created_at', '>=', Carbon::now()->subMonth())->count(); // Example for users registered in the last month
        $userMetrics = [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'newUsers' => $newUsers,
        ];
        return view('admin.reports.user_metrics',compact('userMetrics'));
    }

    public function showQuestionMetrics() : View
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

    public function showUserParticipationMetrics() : View
    {

        return view('admin.reports.user_participation_metrics');
    }

    public function showQuizParticipationMetrics() : View
    {
        return view('admin.reports.quiz_participation_metrics');
    }
    public function showQuestionParticipationMetrics() : View
    {

        return view('admin.reports.question_participation_metrics');
    }


}

