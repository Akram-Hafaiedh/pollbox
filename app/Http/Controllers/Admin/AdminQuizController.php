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
use Illuminate\Support\Facades\DB;
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
            // ->where('has_correct_answers', true)
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
        $users = User::where('admin_id', auth()->id())->get();

        $categories = Category::all();
        return view('admin.quizzes.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        DB::transaction(function ()  use ($validated, $request){

            $quiz = Quiz::create([
                'user_id' => auth()->id(),
                'title' => $validated['title'],
                'description' => $validated['description'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'text_color' => $validated['text_color'],
                'bg_color' => $validated['bg_color'],
                'language' => $validated['language'],
                'visibility' => $validated['visibility'] ?? false,
            ]);


            foreach ($validated['questions']  as $questionData) {
                $question = $quiz->questions()->create([
                    'content' => $questionData['content'],
                    'type' => $questionData['type'],
                    'required' => $questionData['required'],
                    'video_url' => $questionData['video_url'],
                    'image_path'=>isset($questionData['image_path']) && $questionData['image_path']->isValid() ? $questionData['image_path']->store('question_images', 'public') : null,
                ]);
                isset($questionData['options']) ?: $questionData['options'] = [];
                foreach ($questionData['options'] as $optionData) {
                    $question->options()->create([
                        'content' => $optionData['content'],
                    ]);
                }
            }
            if ($validated['visibility'] === 'restricted') {
                $selectedUsers  = $request('selected_users',[]);
                $accessCode = CodeHelper::generateAccessCode();
                foreach ( $selectedUsers as $userId) {
                    $quiz->invitation()->create([
                        'sender_id' => auth()->id(),
                        'recipient_id' => $userId,
                        'code' => $accessCode,
                        'pending' => true,
                    ]);
                }
            }
        });
            return redirect()->route('admin.quizzes.index')
                ->with('success', __('Quiz Créé avec Succés !'));

    }
    // public function userQuizzes(User $user)
    // {
    //     $quizzes = $user->quizzes;
    //     // dd($user, $quizzes);

    //     return view('quizzes.user_quizzes', compact('quizzes', 'user'));
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
        return view('admin.quizzes.show', compact('quiz', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz): View
    {
        $users = User::where('admin_id', auth()->id())->get();
        $quiz->load('questions', 'questions.options');

        return view('admin.quizzes.edit', compact('quiz', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz): RedirectResponse
    {
        $validated = $request->validated();


        DB::transaction(function () use ($validated, $request, $quiz) {
            // Update the quiz details
            $quiz->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'text_color' => $validated['text_color'],
                'bg_color' => $validated['bg_color'],
                'language' => $validated['language'],
                'visibility' => $validated['visibility'] ?? false,
            ]);

            // Update the questions and options
            // This assumes you want to replace all existing questions and options with new ones
            $quiz->questions()->delete(); // Delete existing questions (and related options through cascading, if set up)
            foreach ($validated['questions'] as $questionData) {
                $question = $quiz->questions()->create([
                    'content' => $questionData['content'],
                    'type' => $questionData['type'],
                    'required' => $questionData['required'],
                    'video_url' => $questionData['video_url'],
                    'image_path' => isset($questionData['image_path']) && $questionData['image_path']->isValid() ? $questionData['image_path']->store('question_images', 'public') : null,
                ]);
                isset($questionData['options']) ?: $questionData['options'] = [];
                foreach ($questionData['options'] as $optionData) {
                    $question->options()->create([
                        'content' => $optionData['content'],
                    ]);
                }
            }

            // Update the invitations if the quiz is restricted
            if ($validated['visibility'] === 'restricted') {
                $selectedUsers = $request->input('selected_users', []);
                $quiz->invitations()->delete(); // Delete existing invitations
                $accessCode = CodeHelper::generateAccessCode();
                foreach ($selectedUsers as $userId) {
                    $quiz->invitations()->create([
                        'sender_id' => auth()->id(),
                        'recipient_id' => $userId,
                        'code' => $accessCode,
                        'pending' => true,
                    ]);
                }
            }
        });

        return redirect()->route('admin.quizzes.index')
            ->with('success', __('Quiz Mis à Jour avec Succés !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($id);
        // dd('deleteOne', $id);
        if (auth()->id() == $quiz->user_id) {
            // $quiz->users()->detach();
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


}
