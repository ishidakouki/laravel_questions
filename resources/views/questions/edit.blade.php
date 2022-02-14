@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="d-flex flex-column align-items-center mt-3">
        <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
          @include('commons.error_messages')
            <div class="card mt-5">
                <div class="card-header">
                質問の編集
                </div>
                <div class="card-body">
                    <form class="upload" id="new_post" enctype="multipart/form-data" action="{{ route('questions.update', $question->id) }}" accept-charset="UTF-8" method="POST">
                    @method('POST')
                    @csrf
                        <div class="md-form">
                            <input class="form-control" placeholder="タイトル" type="text" name="title" value="{{ old('title') ?? $question->title }}"/>
                        </div>
                        <div class="form-group">
                            <textarea name="problem" class="form-control" rows="10" placeholder="起きている問題（ソースコードを含めて）">{{ old('problem') ?? $question->problem }}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="problemsolving" class="form-control" rows="10" placeholder="問題解決するために試した事">{{ old('problemsolving') ?? $question->problemsolving }}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="execution" class="form-control" rows="10" placeholder="問題について自分なりに考えた事">{{ old('execution') ?? $question->execution }}</textarea>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="environment" value="更新する" class="btn btn-store btn-primary w-30" data-disable-with="更新する"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
