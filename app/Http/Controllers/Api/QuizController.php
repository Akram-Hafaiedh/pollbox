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
    public function getAllQuizzes(Request $request): JsonResponse
    {
        $user = $request->user();

        $quizzes = Quiz::with(['questions', 'questions.options'])->orderBy('created_at', 'desc')->get();

        return response()->json([
            'quizzes' => $quizzes,
            'user' => $user,
        ], JsonResponse::HTTP_OK);
    }

    public function getQuizById(Request $request, $id): JsonResponse
    {
        $user = $request->user();

        $quiz = Quiz::with(['questions', 'questions.options'])->find($id);
        return response()->json([
            'quiz' => $quiz,
            'user' => $user,
        ], JsonResponse::HTTP_OK);
    }
}
