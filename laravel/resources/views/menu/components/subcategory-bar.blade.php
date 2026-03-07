<div class="subcat-nav-wrap">
    <div class="subcat-nav" id="subcatNav">
        @foreach($categories as $category)
            <div class="subcat-row {{ $loop->first ? 'active' : '' }}"
                 id="subcat-row-{{ $category->id }}"
                 data-cat-id="{{ $category->id }}">
                @foreach($category->subcategories as $sub)
                    @if($sub->is_active && $sub->menuItems->count() > 0)
                        <button class="subcat-pill {{ $loop->first ? 'active' : '' }}"
                                data-sub-id="{{ $sub->id }}"
                                data-cat-id="{{ $category->id }}"
                                onclick="setActiveSub(this, '{{ $category->id }}', '{{ $sub->id }}')">
                            {{ $sub->name }}
                        </button>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>