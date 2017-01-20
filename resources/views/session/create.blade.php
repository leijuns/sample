@extends('layouts.default')
@section('title', '用户登陆')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">登陆</div>
            <div class="panel-body">
                @include('shared.error')
                <form action="{{ route('login') }}" method="post" role="form">
                    <div class="form-group">
                        <label class="control-label">E-MAIl</label>
                        <input class="form-control" type="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">密码</label>
                        <input class="form-control" type="password" name="password" >
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember">记住我
                        </label>
                    </div>
                    {{ csrf_field() }}
                    <button class="btn btn-primary" >登陆</button>
                </form>
                <hr>

                <p>还没账号 <a href="{{ route('signup') }}">立即注册</a></p>
            </div>
        </div>
    </div>
@stop