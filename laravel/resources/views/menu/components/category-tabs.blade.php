<section class="cat-section">
    <div class="cat-grid" id="catGrid">
        @foreach($categories as $category)
            @php $catName = strtolower(trim($category->name)); @endphp
            <div class="cat-tile {{ $loop->first ? 'active' : '' }}"
                 data-cat-id="{{ $category->id }}"
                 onclick="setActiveCategory(this, '{{ $category->id }}')">

                {{-- Food --}}
                @if(str_contains($catName, 'food') || str_contains($catName, 'meal'))
                    <svg viewBox="0 0 48 48" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="18"/>
                        <path d="M16 20c0-6 4-8 8-8s8 2 8 8"/>
                        <path d="M12 26h24M24 12v-4M24 26v10"/>
                    </svg>

                {{-- Beverages / Drinks --}}
                @elseif(str_contains($catName, 'bev') || str_contains($catName, 'drink') || str_contains($catName, 'coffee') || str_contains($catName, 'juice'))
                    <svg viewBox="0 0 48 48" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 10h20l-3 26H17L14 10z"/>
                        <path d="M34 16h4a4 4 0 010 8h-4"/>
                        <path d="M20 6c0-2 4-4 4 0M24 6c0-2 4-4 4 0"/>
                    </svg>

                {{-- Dessert --}}
                @elseif(str_contains($catName, 'dessert') || str_contains($catName, 'sweet') || str_contains($catName, 'cake'))
                    <svg viewBox="0 0 48 48" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 30c0-8 28-8 28 0v6H10v-6z"/>
                        <path d="M10 36h28M16 22c0-6 8-10 8-10s8 4 8 10"/>
                        <path d="M24 12V8M22 8c0-2 4-2 4 0"/>
                    </svg>

                {{-- Add On / Extras / Sides --}}
                @elseif(str_contains($catName, 'add') || str_contains($catName, 'extra') || str_contains($catName, 'side'))
                    <svg viewBox="0 0 48 48" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <rect x="10" y="10" width="28" height="28" rx="2"/>
                        <path d="M16 16h16M16 22h10M16 28h12M16 34h8"/>
                        <circle cx="34" cy="32" r="6"/>
                        <path d="M34 29v6M31 32h6"/>
                    </svg>

                {{-- Default / Generic --}}
                @else
                    <svg viewBox="0 0 48 48" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8v10a6 6 0 0012 0V8"/>
                        <path d="M24 18v22M14 8v32"/>
                        <path d="M14 8s-4 4-4 10 4 6 4 6"/>
                    </svg>
                @endif

                <span class="cat-tile-label">{{ $category->name }}</span>
            </div>
        @endforeach
    </div>
</section>