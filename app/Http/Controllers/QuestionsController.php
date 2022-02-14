<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionsRequest;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Question;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();
        return view('questions.index', ['questions' => $questions]);
    }
    public function create()
    {
        return view('questions.create');
    }
    public function store(QuestionsRequest $request)
    {
        $question = new Question;
        $question->title = $request->title;
        $question->problem = $request->problem;
        $question->problemsolving = $request->problemsolving;
        $question->execution = $request->execution;
        $question->user_id = \Auth::id();
        $question->save();

        return redirect()->route('questions.index');
    }
    public function edit(Question $question, $id)
    {
        $question = Question::findOrFail($id);

        if($question->user_id !== \Auth::id()){
            return view('questions.index')
                    ->with('error','許可されていない操作です');
        }
        return view('questions.edit',compact('question'));
    }
    public function update(QuestionsRequest $request, $id)
    {
        $question = Question::findOrFail($id);

        if(Auth::id() == $question->user_id)
        {
            $question->title = $request->title;
            $question->problem = $request->problem;
            $question->problemsolving = $request->problemsolving;
            $question->execution = $request->execution;
            $question->save();

            return redirect()->route('questions.index');
        }
        return redirect()->route('questions.index')
                    ->with('error', '許可されていない操作です');
    }
    public function destroy($id)
    {
        $question = Question::find($id);

        if(\Auth::id() == $question->user_id){
            $question->delete();
        }

        return back();
    }
}
