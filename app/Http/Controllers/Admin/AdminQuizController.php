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
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use Illuminate\View\View;


class AdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search');
        $quizzes = Quiz::query()
            ->where('user_id', Auth::id()) // Filter by the ID of the currently logged in admin
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
        $users = User::where('role', 'user')->get();
        $categories = Category::all();
        return view('admin.quizzes.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request): RedirectResponse
    {

        $validatedData = $request->validated();

        // dd($validatedData);
        // $questions = $validatedData['questions'];
        // $users = $validatedData['selected_users'];
        // dd($questions, $users);
        // foreach($questions as $questions)

        if (auth()->check()) {
            // Store the quiz
            $quiz = Quiz::create([
                'user_id' => auth()->id(),
                'title' => $validatedData['title'],
                'time_limit' => $validatedData['time_limit'],
                'score' => $validatedData['score'],
                'description' => $validatedData['description'],
                'active' => isset($validatedData['active']) ? $validatedData['active'] : false,
                'visibility' => isset($validatedData['visibility']) ? $validatedData['visibility'] : false,
                'has_correct_answers' => isset($validatedData['has_correct_answers']) ? $validatedData['has_correct_answers'] : false,
            ]);

            // Store questions

            foreach ($validatedData['questions']  as $questionData) {
                // $quiz->users()->attach($validatedData['users']);
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'content' => $questionData['content'],
                    'type' => $questionData['type'],
                    'difficulty' => $questionData['difficulty'],
                    'order' => $questionData['order'],
                    'required' => $questionData['required'],
                ]);

                // Store options
                foreach ($questionData['options'] as $optionData) {
                    // Create the option
                    Option::create([
                        'content' => $optionData['content'],
                        'is_correct' => isset($optionData['is_correct']) ? $optionData['is_correct'] : false,
                        // 'explanation'=>$optionData['explanation'],
                        'question_id' => $question->id,
                    ]);
                }
            }


            // Create an invitation for the restricted uesrs
            if ($validatedData['visibility'] === 'restricted') {

                $accessCode = CodeHelper::generateAccessCode();
                // $accessCode = generateAccessCode();

                foreach ($request->input('selected_users', []) as $userId) {
                    Invitation::create([
                        'quiz_id' => $quiz->id,
                        'sender_id' => auth()->id(),
                        'recipient_id' => $userId,
                        'code' => $accessCode,
                        'pending' => true,
                    ]);
                }
            }




            return redirect()->route('admin.quizzes.index')
                ->with('success', __('Quiz created successfully!'));
        } else {
            return redirect()->route('login')
                ->with('error', __('You must be logged in to create a quizz'));
        }
    }
    // public function userQuizzes(User $user)
    // {
    //     $quizzes = $user->quizzes;
    //     // dd($user, $quizzes);

    //     return view('quizzes.user_quizzes', compact('quizzes', 'user'));
    // }


    // public function showQuiz(User $user, Quiz $quiz): View
    // {
    // $questions = [
    //     "What is your favorite color?",
    //     "What is your favorite movie?",
    //     "If you could travel anywhere, where would you go?",
    //     "What is your favorite hobby?",
    //     "What is your dream job?",
    //     "What is your favorite book?",
    //     "What is your go-to music genre?",
    //     "If you could have any superpower, what would it be?",
    //     "What is your favorite season?",
    //     "If you could have dinner with any historical figure, who would it be?",
    // ];


    //     dd($quiz, $user);


    // $questions = [
    //     "What is your favorite color?" => ["Red", "Blue", "Green", "Yellow","Black"],
    //     "What is your favorite movie?" => ["Action", "Comedy", "Drama", "Sci-Fi"],
    //     "If you could travel anywhere, where would you go?" => ["Paris", "Tokyo", "New York", "Barcelona"],
    //     "What is your favorite hobby?" => ["Reading", "Cooking", "Gaming", "Sports"],
    //     "What is your dream job?" => ["Doctor", "Artist", "Engineer", "Writer"],
    //     "What is your favorite book?" => ["Fiction", "Non-Fiction", "Mystery", "Fantasy"],
    //     "What is your go-to music genre?" => ["Pop", "Rock", "Hip Hop", "Country"],
    //     "If you could have any superpower, what would it be?" => ["Flight", "Invisibility", "Super Strength", "Teleportation"],
    //     "What is your favorite season?" => ["Spring", "Summer", "Fall", "Winter"],
    //     "If you could have dinner with any historical figure, who would it be?" => ["Albert Einstein", "Leonardo da Vinci", "Marie Curie", "Nelson Mandela"],
    // ];

    //     $quiz->load('questions.options');

    //     dd($user,$quiz);

    //     dd($questions);
    //     return view('quiz', compact('questions'));
    // }

    public function access(): View
    {
        return view('access');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz): View
    {

        $quiz->load('selectedUsers');
        $users = $quiz->selectedUsers;


        // dd($quiz->selectedUsers->first()->pivot->code);


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
    public function destroy(Quiz $quiz): RedirectResponse
    {
        dd('deleteOne');
        if (auth()->id() == $quiz->user_id) {
            $quiz->delete();

            return redirect()->route('admin.quizzes.index')
                ->with('success', __('Quiz deleted successfully!'));
        }
        abort(403, 'Unauthorized action.');
    }

    public function destroyAll(): RedirectResponse

    {
        dd('deleteAll');

        return redirect()->route('admin.quizzes.index')
            ->with('success', __('All quizzes deleted successfully'));
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
