@extends('layouts.default')
@section('title', '重设密码')
@section('content')
    <div class="container-fluid password">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">找回密码</div>
                    <div class="panel-body">
                        @include('shared.error')
                        <form action="{{ route('password.reset') }}" method="post" role="form">
                            <div class="form-group">
                                <label class="control-label col-md-4">邮箱地址</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary" type="submit">重置</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop