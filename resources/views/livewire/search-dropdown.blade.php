<div>
    <h6 class="sidebar-title">Search</h6>
    <form action="" class="input-group" method="GET">
        <input wire:model.debounce.500ms="search" type="text" class="form-control" name="search" id="search" placeholder="Search posts by title..." value="{{ request()->query('search') }}" autocomplete="off">
        <div class="input-group-addon">
            <span class="input-group-text"><i class="ti-search"></i></span>
        </div>
    </form>

    @if (strlen($search) >= 2)
        <div class="position-absolute bg-white rounded w-100 mt-4" style="z-index:99;">
            @if ($searchResults->count() > 0)
                <ul class="p-0 list-unstyled">
                    @foreach ($searchResults as $searchResult)
                        <li class="border-bottom border-secondary">
                            <a href="{{ route('blog.show', $searchResult->id) }}" class="d-block px-3 py-3">
                                <img src="/storage/{{ $searchResult->image }}" class="w-25" alt="">
                                <span class="ml-2 text-muted">{{ $searchResult->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No search results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>