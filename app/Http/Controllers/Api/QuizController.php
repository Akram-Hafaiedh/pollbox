<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Response;
use App\Models\UserQuizState;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function submitQuiz(Request $request, $id): JsonResponse
    {
        try {
            $user = $request->user();
            $quiz = Quiz::with(['questions', 'questions.options'])->findOrFail($id);
            $quizQuestionsCount = count($quiz->questions);

            $responses = $request->input('responses');
            if (!$responses) {
                return response()->json([
                    'success' => false,
                    'message' => 'No quiz responses provided'
                ], JsonResponse::HTTP_BAD_REQUEST);
            }
            $responsesQuestionCount = count(array_unique(array_column($responses, 'question_id')));

            // $user->responses()->createMany($responses);

            DB::beginTransaction();

            foreach ($responses as $questionId => $response) {
                if (isset($response['selected_option'])) {
                    Response::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'question_id' => $questionId,
                            'quiz_id' => $quiz->id,
                        ],
                        [
                            'option_id' => $response['selected_option'],
                        ]
                    );
                } elseif (isset($response['rankings'])) {
                    foreach ($response['rankings'] as $optionId => $rank) {
                        Response::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'question_id' => $questionId,
                                'option_id' => $optionId,
                                'quiz_id' => $quiz->id,
                            ],
                            [
                                'ranking' => $rank,
                            ]
                        );
                    }
                } elseif (isset($response['selected_options'])) {
                    foreach ($response['selected_options'] as $optionId) {
                        Response::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'question_id' => $questionId,
                                'option_id' => $optionId,
                                'quiz_id' => $quiz->id,
                            ],
                            [
                                'selected' => true,
                            ]
                        );
                    }
                } elseif (isset($response['answer'])) {
                    Response::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'question_id' => $questionId,
                            'quiz_id' => $quiz->id,
                        ],
                        [
                            'answer' => $response['answer'],
                        ]
                    );
                } elseif (isset($response['scale_value'])) {
                    Response::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'question_id' => $questionId,
                            'quiz_id' => $quiz->id,
                        ],
                        [
                            'likert_scale' => $response['scale_value'],
                        ]
                    );
                }
            }

            $allQuestionsAnswered = $quizQuestionsCount === $responsesQuestionCount;

            $correctResponses = true;
            foreach ($responses as $response) {
                if ((isset($response['selected_options']) && count($response['selected_options']) !== $quizQuestionsCount) ||
                    (isset($response['rankings']) && count($response['rankings']) !== $quizQuestionsCount)
                ) {
                    $correctResponses = false;
                    break;
                }
            }

            $quizFinished = $allQuestionsAnswered && $correctResponses; // Quiz is finished if all questions are answered and the responses match the number of questions

            $state = $quizFinished ? 'finished' : 'in_progress';

            UserQuizState::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                ],
                [
                    'state' => $state,
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Quiz responses saved successfully'
            ], JsonResponse::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Quiz not found'
            ], JsonResponse::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving responses'
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
