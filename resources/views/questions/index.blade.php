@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Laravel question <i class="fas fa-mail-bulk"></i></h1>
</div>
<div class="col-md-8 col-md-2 mx-auto">
  @if(session('error'))
       <p class="alert alert-danger">{{ session('error') }}<p>
  @endif

  @include('commons.error_messages')
</div>

@foreach ($questions as $question)
<div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card mt-3">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="">
                    <i class="fas fa-user-circle fa-2x mr-1"></i>
                </a>
                <a class="black-color" title="" href="{{ route('users.show', $question->user_id) }}">
                    <strong>
                    {{ $question->user->name }}
                    </strong>
                </a>
            </div>
            <div class="card-body">
                <div  class="post_edit text-right">
                @if (Auth::id() == $question->user_id)

                <form class="edit_button" method="get" action="{{ route('questions.edit', $question->id) }}">
                    @csrf
                    <button class="btn btn-size btn-primary"><i class="far fa-edit"></i>編集</button>
                </form>
                <form class="edit_button" method="post" action="{{ route('questions.destroy',$question->id) }}" accept-charset="UTF-8">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-size btn-danger" rel="nofollow" ><i class="far fa-trash-alt"></i>削除</button>
                </form>
                @endif
                <h3 class="h5 title text-left">
                    {{ $question->title }}
                </h3>
                <div class="mb-5 text-left">
                    {{!! nl2br(e($question->problem)) !!}}
                </div>
                <div class="mb-5 text-left">
                    {{!! nl2br(e($question->problemsolving)) !!}}
                </div>
                <div class="mb-5 text-left">
                    {{!! nl2br(e($question->execution)) !!}}
                </div>
                <siv>
                {{-- <span class="help-block">
                @include('commons.error_messages')
                </span> --}}
                @foreach($question->comments as $comment)
                    <div class="container mt-4 text-left">
                        <div class="border-top p-1">
                            <span>
                                    <div class="post_edit">
                                        <form class="edit_button" method="get" action="{{ route('comments.edit', $comment->id ) }}">
                                            @csrf
                                            <button class="btn btn-size btn-primary"><i class="far fa-edit"></i>編集</button>
                                        </form>
                                        <form class="edit_button" method="post" action="{{ route('comments.destroy', $comment->id) }}" accept-charset="UTF-8">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-size btn-danger" rel="nofollow" ><i class="far fa-trash-alt"></i>削除</button>
                                        </form>
                                    </div>
                                <strong>
                                    <a class="no-text-decoration black-color" href="">
                                    {{$comment->user->name}}
                                    </a>
                                </strong>
                            </span>
                            <div class="comments mt-1">

                                {{!! nl2br(e($comment->comment)) !!}}

                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="comment-post-1">
                        <div class="m-4">
                            <form class="w-100" action="{{ route('comments.create',$question->id ) }}" method="post">
                                @csrf

                                <input type="submit" value="&#xf075;コメント入力" class="far fa-comment btn btn-default btn-sm">
                                </input>
                            </form>
                        </div>
                </div>
                </section>
               </div>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
