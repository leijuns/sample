<a href="{{ isset($avatar_href) ? $avatar_href : route('users.show', $user->id) }}" class="header">
    <img src="{{ $user->getAvatar(100) }}" alt="{{ $user->name }}" class="gravatar">
</a>
@if(isset($has_username) && $has_username === true)
    <h1>{{ $user->name }}</h1>
@endif