<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAnswer;
use App\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getQuestions(): JsonResponse
    {
        $questions = Question::latest()->get();

        return response()->json([
            'data' => $questions,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitQuiz(Request $request): JsonResponse
    {
        $customer_answer = CustomerAnswer::create([
            'customer_id' => $request->customer_id,
            'answer' => $request->answer,
        ]);

        return response()->json([
            'message' => 'tebrikler sizin xaliniz nese nese',
        ]);
    }
}
