<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::inRandomOrder()
            ->paginate(5);
        return view('quizzes.index', compact('quizzes'));
    }
    
    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function answer(Request $request, Quiz $quiz)
    {
        $answer = $request->input('answer');
        $isCorrect = ($answer == $quiz->answer);

        return view('quizzes.answer', compact('quiz', 'answer', 'isCorrect'));
    }
}
