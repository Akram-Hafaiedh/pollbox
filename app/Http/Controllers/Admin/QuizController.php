<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CodeHelper;
use App\Models\Question;
use Illuminate\View\View;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->get('search');
        $quizzes = Quiz::query()
            ->where('has_correct_answers', true)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.quizzes.index', compact('quizzes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::where('role','user')->get();
        return view('admin.quizzes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request): RedirectResponse
    {

        $validatedData = $request->validated();
        // dd($validatedData);
        $questions = $validatedData['questions'];
        dd($questions);
        // foreach($questions as $questions)

        if (auth()->check()) {
            $quiz = Quiz::create([
                'user_id' => auth()->id(),
                'title' => $validatedData['title'],
                'time_limit' => $validatedData['time_limit'],
                'score' => $validatedData['score'],
                'description' => $validatedData['description'],
                'active' => $validatedData['active'],
                'visibility' => $validatedData['visibility'],
                'has_correct_answers' => $validatedData['has_correct_answers'],
            ]);

            foreach( $questions as $question){
                Question::create([

                ]);
            }

            // Generate a 4-digit access code
            $accessCode = generateAccessCode();

            // dd($accessCode);


            foreach ($request->input('users', []) as $userId) {
                Invitation::create([
                    'quiz_id' => $quiz->id,
                    'sender_id' => auth()->id(),
                    'recipient_id' => $userId,
                    'code' => $accessCode,
                    'pending' => true,
                ]);
            }




            return redirect()->route('admin.quizzes.index')
                ->with('success', 'Quiz created successfully!');
        } else {
            return redirect()->route('login')
                ->with('error', __('You must be logged in to create a quizz'));
        }
        dd($validatedData->questions);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz) : View
    {

        // dd($quiz->questions);
        $users = User::all();

        return view('admin.quizzes.show', compact('quiz', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function topQuizzes(): View
    {
        // $topUsers = User::with(['quizzes' => function ($query) {
        //     $query->where('has_correct_answers', true)
        //         ->orderBy('score', 'desc')
        //         ->take(3);
        // }])->get();


        $topQuizzes = Quiz::where('has_correct_answers', true)
            ->orderBy('score', 'desc') // Replace with the actual column
            ->take(3)
            ->get();
        // dd($topQuizzes);
        return view('admin.quizzes.top-quizzes', compact('topQuizzes'));
    }
}
