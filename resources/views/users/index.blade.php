@extends('layouts.default')
@section('title', '所有用户')
@section('content')
<div class="col-md-8 col-md-offset-2 users">
    <h1>所有用户</h1>
    <ul>
        @foreach($users as $user)
            <li>
                <img src="{{ $user->getAvatar(100) }}" alt="{{ $user->name }}" class="">
                <a href="{{ route('users.show', $user->id) }}" class="offset-left-1">{{ $user->name }}</a>
                @can('destroy', $user)
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm delete-btn">删除</button>
                </form>
                @endcan
            </li>
        @endforeach
    </ul>
    {!! $users->render() !!}
</div>
@stop