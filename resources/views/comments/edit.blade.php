@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="d-flex flex-column align-items-center mt-3">
        <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
            @include('commons.error_messages')
            <div class="card mt-5">
                <div class="card-header">
                    コメントの編集
                </div>
                <div class="card-body">
                    <form class="upload" id="new_post" action="{{ route('comments.update', $comment->id) }}" accept-charset="UTF-8" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <textarea name="comments" class="form-control" rows="10" value="" placeholder="コメント">{{ old('comments') ?? ($comment->comment)  }}</textarea>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="commit" value="更新する" class="btn btn-store btn-primary w-30" data-disable-with="更新する"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
