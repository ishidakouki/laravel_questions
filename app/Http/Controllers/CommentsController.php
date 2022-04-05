<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentQuestionRequest;
use App\Http\Requests\CommentEditRequest;

use App\Question;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function create($id)
    {
        $question = Question::find($id);
        return view('comments.create',compact('question'));
    }
    public function store(CommentQuestionRequest $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->question_id = $request->question_id;
        $comment->comment = $request->comments[$request->question_id];
        $comment->save();

        return redirect()->route('questions.index');
    }
    public function edit($id) {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(CommentEditRequest $request, $id)
    {
        $comment = Comment::find($id);

        if(Auth::id() == $comment->user->id){
            $comment->comment = $request->comments;
            $comment->save();

            return redirect()->route('questions.index');
        }

        return redirect()->route('questions.index')->with('error', '許可されていない操作です');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if(Auth::id() !== $comment->user->id){
            return redirect()->route('questions.index')->with('error', '許可されていない操作です');
        }

        $comment -> delete();
        return redirect()->route('questions.index');

    }
}
