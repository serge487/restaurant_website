<main class="menu-main" id="menuMain">
    @foreach($categories as $category)
        <section class="cat-content {{ $loop->first ? 'active' : '' }}"
                 id="cat-content-{{ $category->id }}"
                 data-cat-id="{{ $category->id }}">

            @foreach($category->subcategories as $sub)
                @if($sub->is_active && $sub->menuItems->count() > 0)
                    <div class="sub-panel {{ $loop->first ? 'active' : '' }}"
                         id="sub-panel-{{ $sub->id }}"
                         data-sub-id="{{ $sub->id }}"
                         data-cat-id="{{ $category->id }}">

                        <div class="subcat-heading">{{ $sub->name }}</div>

                        <div class="items-grid">
                            @foreach($sub->menuItems->where('is_available', true) as $item)
                                <div class="menu-card"
                                     data-item-id="{{ $item->id }}"
                                     onclick="addToCart({{ $item->id }}, '{{ addslashes($item->name) }}', {{ $item->price }}, '{{ $item->image ? asset('storage/' . $item->image) : '' }}')">

                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                             class="menu-card-img">
                                    @else
                                        <div class="menu-card-img-placeholder">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18 8h1a4 4 0 010 8h-1"/>
                                                <path d="M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/>
                                                <line x1="6" y1="2" x2="6" y2="4"/>
                                                <line x1="10" y1="2" x2="10" y2="4"/>
                                                <line x1="14" y1="2" x2="14" y2="4"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="menu-card-body">
                                        <div class="menu-card-top">
                                            <h4 class="menu-card-name">{{ $item->name }}</h4>
                                            <span class="menu-card-price">${{ number_format($item->price, 2) }}</span>
                                        </div>
                                        @if($item->description)
                                            <p class="menu-card-desc">{{ $item->description }}</p>
                                        @endif
                                    </div>

                                    <button class="menu-card-add"
                                            id="add-btn-{{ $item->id }}"
                                            onclick="event.stopPropagation(); addToCart({{ $item->id }}, '{{ addslashes($item->name) }}', {{ $item->price }}, '{{ $item->image ? asset('storage/' . $item->image) : '' }}')"
                                            title="Add to order">+</button>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif
            @endforeach

        </section>
    @endforeach
</main>