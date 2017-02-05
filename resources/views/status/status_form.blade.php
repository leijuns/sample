<form action="{{ route('statuses.store') }}" method="post" role="form">
    @include('shared.error')
    {{ csrf_field() }}
    <div class="form-group">
        <textarea name="contents" placeholder="说说今天的新鲜事吧" id="contents" cols="20" rows="5" class="form-control">{{ old('contents') }}</textarea>
    </div>
    <div class="content-right">
        <button class="btn btn-primary">发表</button>
    </div>
</form>