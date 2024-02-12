<?php

use App\Http\Controllers\Admin\AdminAssessementController;
use App\Http\Controllers\Admin\AdminExamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\IncomeChartController;
use App\Http\Controllers\PdfImportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserQuizController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserQuizController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('user')->group(function () {
        Route::get('/quizzes/history', [UserQuizController::class, 'history'])->name('user.quizzes.history');
        Route::post('/quizzes/history/filter', [UserQuizController::class, 'filter'])->name('user.quizzes.history.filter');

        Route::resource('quizzes', UserQuizController::class)
            ->names([
                'index' => 'user.quizzes.index',
                'show' => 'user.quizzes.show',
            ])
            ->only(['index', 'show']);
        Route::post('/quizzes/{quiz}/submit', [UserQuizController::class, 'submitQuiz'])->name('user.quizzes.submit');
        Route::get('/quizzes/{quiz}/result', [UserQuizController::class, 'showResults'])->name('user.quizzes.results');

        //! ADDED ROUTES FOR QUIZ
        Route::get('/quiz-start/{quiz}', [UserQuizController::class, 'startQuiz'])->name('quiz-start');
        Route::get('/quiz-access/{quiz}', [UserQuizController::class, 'access'])->name('quiz-access');
    });
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Your admin routes here
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/users/destroyAll', [AdminUserController::class, 'destroyAll'])->name('admin.users.destroyAll');
    Route::resource('/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',

    ]);
    Route::post('/import/csv/users', [CsvImportController::class, 'importUsersFromCsv'])->name('admin.users.importCsv');
    Route::post('/import/pdf/users', [PdfImportController::class, 'importUsersFromPDF'])->name('admin.users.importPdf');
    Route::get('/export/users-csv-template', [CsvImportController::class, 'exportCsvTemplate'])->name('admin.users.export-template');

    // Quiz related routes
    Route::get('/reports', [AdminQuizController::class, 'reports'])->name('admin.reports');
    Route::delete('/quizzes/destroyAll', [AdminQuizController::class, 'destroyAll'])->name('admin.quizzes.destroyAll');
    Route::resource('/quizzes', AdminQuizController::class)->names([
        'index' => 'admin.quizzes.index',
        'create' => 'admin.quizzes.create',
        'store' => 'admin.quizzes.store',
        'show' => 'admin.quizzes.show',
        'edit' => 'admin.quizzes.edit',
        'update' => 'admin.quizzes.update',
        'destroy' => 'admin.quizzes.destroy',
    ]);
    
    Route::post('/import/quizzes', [CsvImportController::class, 'importQuizzesFromCsv'])->name('admin.quizzes.importQuizzesCsv');


    Route::get('/admin/surveys', [SurveyController::class, 'index'])->name('admin.surveys.index');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::get('/more-settings', [SettingsController::class, 'more'])->name('admin.more-settings');

    Route::get('/reports', [AdminReportsController::class, 'reports'])->name('admin.reports.dashboard');
    Route::get('/reports/quizzes', [AdminReportsController::class, 'display'])->name('admin.reports.quizzes');
    Route::get('/quizzes/{quiz}/report', [AdminReportsController::class, 'show'])->name('admin.reports.quiz');
    Route::get('/users/{user}/quizzes', [AdminReportsController::class, 'showUserQuizzes'])->name('admin.reports.user_quizzes');
    Route::get('/users/{user}/quizzes/{quiz}/report', [AdminReportsController::class, 'showUserQuiz'])->name('admin.reports.user_quiz');
    // Route::get('/users/{user}/report', [AdminReportsController::class, 'showUser'])->name('admin.reports.user');




    Route::get('/reports/quiz-metrics', [AdminReportsController::class, 'showQuizMetrics'])->name('admin.reports.quiz_metrics');
    Route::get('/reports/user-metrics', [AdminReportsController::class, 'showUserMetrics'])->name('admin.reports.user_metrics');
    Route::get('/reports/question-metrics', [AdminReportsController::class, 'showQuestionMetrics'])->name('admin.reports.question_metrics');
    Route::get('/reports/participation-metrics', [AdminReportsController::class, 'showParticipationMetrics'])->name('admin.reports.participation_metrics');
    Route::get('/reports/quiz-participation-metrics', [AdminReportsController::class, 'showQuizParticipationMetrics'])->name('admin.reports.quiz_participation_metrics');
    Route::get('/reports/user-participation-metrics', [AdminReportsController::class, 'showUserParticipationMetrics'])->name('admin.reports.user_participation_metrics');
    Route::get('/reports/question-participation-metrics', [AdminReportsController::class, 'showQuestionParticipationMetrics'])->name('admin.reports.question_participation_metrics');

    Route::resource('/exams', AdminExamController::class)->names([
        'index' => 'admin.exams.index',
        'create' => 'admin.exams.create',
        'store' => 'admin.exams.store',
        'show' => 'admin.exams.show',
        'edit' => 'admin.exams.edit',
        'update' => 'admin.exams.update',
        'destroy' => 'admin.exams.destroy',
    ]);

    Route::resource('/assessments', AdminAssessementController::class)->names([
        'index' => 'admin.assessments.index',
        'create' => 'admin.assessments.create',
        'store' => 'admin.assessments.store',
        'show' => 'admin.assessments.show',
        'edit' => 'admin.assessments.edit',
        'update' => 'admin.assessments.update',
        'destroy' => 'admin.assessments.destroy',
    ]);
});


Route::get('/access', [UserQuizController::class, 'access']);





// Route::prefix('survey')->group(function () {
//     Route::get('/', [SurveyController::class, 'index'])->name('surveys.index');
//     Route::get('/create', [SurveyController::class, 'create'])->name('surveys.create');
//     Route::post('/store', [SurveyController::class, 'store'])->name('surveys.store');
//     Route::get('/{survey}', [SurveyController::class, 'show'])->name('surveys.show');
//     Route::get('/{survey}/result', [SurveyController::class, 'showResults'])->name('surveys.results');
//     Route::get('/{survey}/acceess', [SurveyController::class, 'access'])->name('surveys.acceess');
//     Route::get('/{survey}/preview', [SurveyController::class, 'preview'])->name('surveys.preview');
//     Route::post('/{survey}/submit', [SurveyController::class, 'submit'])->name('surveys.submit');
//     Route::get('/{survey}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
//     Route::patch('/{survey}/update', [SurveyController::class, 'update'])->name('surveys.update');
//     Route::delete('/{survey}/destroy', [SurveyController::class, 'destroy'])->name('surveys.destroy');
//     Route::get('/{survey}/questions', [SurveyController::class, 'questions'])->name('surveys.questions');
//     Route::get('/{survey}/questions/{question}', [SurveyController::class, 'question'])->name('surveys.question');
//     Route::post('/{survey}/questions', [SurveyController::class, 'storeQuestion'])->name('surveys.storeQuestion');
//     Route::post('/{survey}/questions/{question}/update', [SurveyController::class, 'updateQuestion'])->name('surveys.updateQuestion');
//     Route::delete('/{survey}/questions/{question}/destroy', [SurveyController::class, 'destroyQuestion'])->name('surveys.destroyQuestion');
// });

Route::get('/chart', [IncomeChartController::class, 'index'])->name('chart.index');
