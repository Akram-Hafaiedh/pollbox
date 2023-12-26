<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {

        $user = $request->user();
        // $admin = $user->admin;

        $quizzes = Quiz::all();
        // query()
        //     ->where('visibility', 'public')
        //     ->orWhere(function ($query) use ($user) {
        //         $query->where('visibility', 'private')->whereHas('admin', function ($query) use ($user) {
        //             $query('id', $user->admin_id);
        //         });
        //     })
        //     ->orWhere(function ($query) use ($user) {
        //         $query->where('visibility', 'restricted')->whereJsonContains('selected_users', $user->id);
        //     })
        //     ->get();


        return response()->json([$quizzes, $user], 200);

        // Retrun QuizResource::collection(Quiz::all())
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return new QuizResource(Quiz::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
