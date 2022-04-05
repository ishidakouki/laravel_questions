@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="user-card col-md-12">
            <div class="text-center">
                <i class="fas fa-user-circle fa-3x"></i>
                <h3>
                  エラー表示ページ
                </h3>
                <h3>
                  {{ $e }}
                </h3 class="user-show-name">


            </div>
        </div>
    </div>
</div>

@endsection
