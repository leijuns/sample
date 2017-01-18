@extends('layouts.default')
@section('title', '注册')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">注册</div>
            <div class="panel-body">
                <form action="{{ route('user.store') }}" role="form">
                    <div class="form-group">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop