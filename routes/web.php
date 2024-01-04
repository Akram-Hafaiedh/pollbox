<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminUserController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Your admin routes here
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);


    // Quiz related routes
    Route::get('/top-quizzes', [AdminQuizController::class, 'topQuizzes'])->name('admin.topQuizzes');
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

    Route::get('/admin/surveys', [SurveyController::class, 'index'])->name('admin.surveys.index');
});


Route::get('/access', [UserQuizController::class, 'access']);



Route::prefix('user')->group(function () {
    Route::get('/quizzes/history', [UserQuizController::class, 'history'])->name('user.quizzes.history');
    Route::resource('quizzes', UserQuizController::class)
        ->names([
            'index' => 'user.quizzes.index',
            'show' => 'user.quizzes.show',
        ])
        ->only(['index', 'show']);
    Route::post('quizzes/{quiz}/submit', [UserQuizController::class, 'submitQuiz'])->name('user.quizzes.submit');
    Route::get('/quizzes/{quiz}/result', [UserQuizController::class, 'showResults'])->name('user.quizzes.results');

    //! ADDED ROUTES FOR QUIZ
    Route::get('/quiz-start/{quiz}', [UserQuizController::class, 'startQuiz'])->name('quiz-start');
    Route::get('/quiz-access/{quiz}', [UserQuizController::class, 'access'])->name('quiz-access');
});


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

Route::get('/test', function () {
    $quiz = App\Models\Quiz::find(1);
    return view('quizzes.show_quiz', compact('quiz'));
});
