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
    Route::get('/admin/top-quizzes', [AdminQuizController::class, 'topQuizzes'])->name('admin.topQuizzes');
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


Route::get('/test', function () {
    return view('quizzes.login');
});
Route::get('/access', [UserQuizController::class, 'access']);

// Route::get('/user/{user}/quizzes', [QuizController::class,'userQuizzes'])->name('user.quizzes.index');
// Route::get('/users/{user}/quizzes/{quiz}', [QuizController::class, 'show'])->name('show.quiz');

Route::prefix('user')->group(function () {
    Route::resource('quizzes', UserQuizController::class)
        ->names([
            'index' => 'user.quizzes.index',
            'show' => 'user.quizzes.show',
        ])
        ->only(['index', 'show']);
    Route::post('quizzes/{quiz}/submit', [UserQuizController::class, 'submitResponse'])->name('user.quizzes.submit');
    Route::get('/quizzes/acceess/{quiz}', [UserQuizController::class, 'access'])->name('user.quizzes.acceess');
});
