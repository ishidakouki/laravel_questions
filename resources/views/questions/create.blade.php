@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
            @include('commons.error_messages')
            <div class="card">
                <div class="card-header">質問の新規作成</div>
                <div class="card-body">
                    <form class="upload" name="environment" id="" enctype="multipart/form-data" action="{{ route('questions.store') }}" accept-charset="UTF-8" method="POST">
                    @method('POST')
                    @csrf
                        <div class="md-form">
                            <input class="form-control" placeholder="聞きたいこと、分からない事（一文で）" name="title" value=""/>
                        </div>
                        <div class="form-group">
                            <textarea name="problem" class="form-control" rows="10" placeholder="起きている問題（ソースコードを含めて）"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="problemsolving" class="form-control" rows="10" placeholder="問題解決するために試した事"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="execution" class="form-control" rows="10" placeholder="問題について自分なりに考えた事"></textarea>
                        </div>
                        <div class="text-center">
                            <input button type="submit" name="environment" value="質問する" class="btn btn-store btn-primary w-25" data-disable-with="質問する"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  </div>

@endsection
