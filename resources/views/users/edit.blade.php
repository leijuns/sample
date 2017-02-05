@extends('layouts.default')
@section('title', '编辑用户资料')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">编辑资料</div>
            <div class="panel-body">
                @include('shared.error')
                <div class="edit-gravatar">
                    @include('shared.avatar', ['has_username'=>false, 'avatar_href'=>'http://gravatar.com/emails'])
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    <div class="form-group">
                        <label class="control-label">姓名</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">邮箱</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="control-label">密码</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">确认密码</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@stop