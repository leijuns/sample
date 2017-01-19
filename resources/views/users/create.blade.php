@extends('layouts.default')
@section('title', '注册')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">注册</div>
            <div class="panel-body">
                @include('shared.error')
                <form action="{{ route('users.store') }}" method="post" role="form">
                    <div class="form-group">
                        <label class="control-label">姓名:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">邮箱:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">密码:</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">确认密码:</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">注册</button>
                </form>
            </div>
        </div>
    </div>
@stop