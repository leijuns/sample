@extends('layouts.default')
@section('title','首页')
@section('content')
    @if(Auth::check())
    <div class="row">
        <div class="col-md-7">
            <section class="status-form">
                @include('status.status_form')
            </section>
            <section class="status-list">
                <h3>微博列表</h3>
                @include('shared.feed')
            </section>

        </div>
    </div>
    @else
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Laravel Project</h1>
            <p>这是我的跟随训练</p>
            <a href="{{ route('signup') }}"><button class="btn btn-success">立即注册</button></a>
        </div>
    </div>
    @endif
@stop