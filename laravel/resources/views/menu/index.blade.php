<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTO | Digital Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #000000; color: #f3f4f6; font-family: 'Inter', sans-serif; }
        .text-gold { color: #d4af37; }
        .border-gold { border-color: #d4af37; }
        /* Smooth scrolling for navigation */
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="antialiased pb-24">

    <!-- Header Area -->
    <header class="text-center py-16 border-b border-gray-900 mx-4">
        <h1 class="text-6xl font-bold tracking-tighter uppercase mb-2">RESTO</h1>
        <p class="text-xs text-gray-500 tracking-[0.5em] uppercase">Culinary Excellence</p>
    </header>

    <!-- Category Quick Navigation (Optional but pro) -->
    <nav class="sticky top-0 bg-black/80 backdrop-blur-md z-50 border-b border-gray-900 py-4 mb-10 overflow-x-auto whitespace-nowrap px-6 no-scrollbar">
        @foreach($categories as $category)
            <a href="#category-{{ $category->id }}" class="inline-block text-xs uppercase tracking-widest text-gray-400 hover:text-gold px-4 transition-colors">
                {{ $category->name }}
            </a>
        @endforeach
    </nav>

    <!-- Main Content Area -->
    <main class="max-w-4xl mx-auto px-6">
        
        @foreach($categories as $category)
            <section class="mb-20" id="category-{{ $category->id }}">
                <!-- Main Category Heading (e.g. FOOD) -->
                <div class="flex items-center gap-4 mb-12">
                    <div class="h-[1px] flex-1 bg-gray-800"></div>
                    <h2 class="text-3xl font-light uppercase tracking-[0.2em] text-gray-300">
                        {{ $category->name }}
                    </h2>
                    <div class="h-[1px] flex-1 bg-gray-800"></div>
                </div>

                @foreach($category->subcategories as $subcategory)
                    @if($subcategory->menuItems->count() > 0)
                        <!-- Subcategory Heading (e.g. Burgers) -->
                        <div class="mb-10">
                            <h3 class="text-lg font-semibold text-gold uppercase tracking-widest mb-6 border-l-2 border-gold pl-4">
                                {{ $subcategory->name }}
                            </h3>
                            
                            <!-- Items List -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                                @foreach($subcategory->menuItems as $item)
                                    <div class="group">
                                        <div class="flex justify-between items-baseline mb-2">
                                            <h4 class="text-base font-medium uppercase tracking-wide group-hover:text-gold transition-colors">
                                                {{ $item->name }}
                                            </h4>
                                            <div class="ml-4 text-sm font-bold text-gold tabular-nums">
                                                ${{ number_format($item->price, 2) }}
                                            </div>
                                        </div>
                                        @if($item->description)
                                            <p class="text-sm text-gray-500 leading-relaxed font-light italic">
                                                {{ $item->description }}
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </section>
        @endforeach

    </main>

    <footer class="text-center py-20 border-t border-gray-900 opacity-30">
        <p class="text-[10px] tracking-[0.4em] uppercase">All rights reserved &copy; 2024</p>
    </footer>

</body>
</html>