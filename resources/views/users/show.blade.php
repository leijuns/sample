@extends('layouts.default')
@section('title', '个人信息')
@section('content')
    @include('shared.message')
    <div class="users-show row">
        <div class="col-md-4">
            <div class="head-left col-md-6">
                @include('shared.avatar')
            </div>
            <div class="head-right col-md-6">
                <h1>{{ $user->name }}</h1>
                <p>是我站第<b>{{ $count }}</b>位会员</p>
                <p>注册于 <small>{{ $user->created_at->diffForHumans() }}</small></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">最新微博</div>
            </div>
        </div>
    </div>

@stop