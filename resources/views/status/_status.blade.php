<li id="status-{{ $status->id }}">
    <a href="{{ route('users.show', $user->id) }}">
        <img src="{{ $user->getAvatar() }}" alt="{{ $user->name }}" class="gravatar">
    </a>
    <span class="user">
        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
    </span>
    @can('destroy', $status)
    <form action="{{ route('statuses.destroy', $status->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger delete-btn btn-sm">删除</button>
    </form>
    @endcan
    <span class="timestamp">{{ $status->created_at->diffForHumans() }}</span>
    <span class="content">{{ $status->content }}</span>
</li>