<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAnswer;
use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getQuestions()
    {
        $questions = Question::latest()->get();

        return response()->json([
           'data' => $questions,
        ]);
    }

    public function submitQuiz(Request $request)
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
