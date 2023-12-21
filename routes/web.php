<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\SurveyController;
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
    Route::get('/admin/top-quizzes', [QuizController::class, 'topQuizzes'])->name('admin.topQuizzes');
    Route::resource('/quizzes', QuizController::class)->names([
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


Route::get('/quiz', [QuizController::class, 'showQuiz']);
Route::get('/access', [QuizController::class, 'access']);
