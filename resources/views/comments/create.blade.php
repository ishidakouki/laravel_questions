@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-2 mx-auto">
  @if(session('error'))
       <p class="alert alert-danger">{{ session('error') }}<p>
  @endif

  @include('commons.error_messages')
</div>
<div class="card-body ">
    <div class="card-wrap">
        <div class="card mt-3">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="">
                    <i class="fas fa-user-circle fa-2x mr-1"></i>
                </a>
                <a class="black-color" title="" href="">
                    <strong>
                    {{ $question->user->name }}
                    </strong>
                </a>
            </div>
            <div class="card-body">
                <div  class="post_edit text-right">
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
                                <span>
                                {{ nl2br(e($comment->comment)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="comment-post-1">
                        <div class="form-group">
                            <form class="w-100" action="{{ route('comments.store') }}" method="post">
                                @csrf
                                    <input name="utf8" type="hidden" value=""/>
                                    <input value="" type="hidden" name="user_id" />
                                    <input value="{{ $question->id }}" type="hidden" name="question_id" />
                                    <div class="form-group">
                                    <textarea name="comments[{{ $question->id }}]" class="form-control" rows="10" placeholder="コメントを入力する"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <input type="submit" value="&#xf075;コメント送信" class="far fa-comment btn btn-default btn-sm">
                                        </input>
                                    </div>
                            </form>
                        </div>
                        </section>
               </div>
            </div>
        </div>
    </div>
</div>


@endsection
