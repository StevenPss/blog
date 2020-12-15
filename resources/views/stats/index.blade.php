<div class="col-md-4">
    <div class="list-group">
        @if (auth()->user()->isAdmin())
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Users <span class="badge badge-primary badge-pill">@if (isset($users))
                {{ $users->count() }}
            @endif</span></a>
        @endif
        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Posts <span class="badge badge-primary badge-pill">@if (isset($posts))
                {{ $posts->count() }}
            @endif</span></a>
        <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Categories <span class="badge badge-primary badge-pill">@if (isset($categories))
            {{ $categories->count() }}
        @endif</span></a>
        <a href="{{ route('tags.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Tags <span class="badge badge-primary badge-pill">@if (isset($tags))
            {{ $tags->count() }}
        @endif</span></a>
    </div>

    <div class="list-group">
        <a href="{{ route('trashed-posts.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center mt-5">Trashed Posts <span class="badge badge-primary badge-pill">2</span></a>                                
    </div>
</div>