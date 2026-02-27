<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTO | Digital Menu</title>
    <!-- We use Tailwind CDN for ultra-fast, clean styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Dark Theme mimicking the premium vibe */
        body {
            background-color: #121212;
            color: #f3f4f6;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .text-gold {
            color: #d4af37; /* Premium Gold Accent */
        }
    </style>
</head>
<body class="antialiased pb-24">

    <!-- Header Area -->
    <header class="text-center py-12 border-b border-gray-800 mx-4">
        <h1 class="text-5xl font-bold tracking-widest uppercase mb-2">RESTO</h1>
        <p class="text-sm text-gray-400 tracking-[0.3em] uppercase">Restaurant & Bar</p>
    </header>

    <!-- Menu Content -->
    <main class="max-w-3xl mx-auto px-6 mt-10">
        
        @foreach($categories as $category)
            <!-- Only show the category if it has items -->
            @if($category->menuItems->count() > 0)
                <section class="mb-14" id="category-{{ $category->id }}">
                    <!-- Category Title -->
                    <h2 class="text-2xl font-semibold uppercase tracking-widest mb-8 pb-3 border-b border-gray-800 text-center">
                        {{ $category->name }}
                    </h2>
                    
                    <!-- Menu Items List -->
                    <div class="space-y-8">
                        @foreach($category->menuItems as $item)
                            <div class="flex justify-between items-start gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium uppercase tracking-wide">{{ $item->name }}</h3>
                                    @if($item->description)
                                        <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                                            {{ $item->description }}
                                        </p>
                                    @endif
                                </div>
                                <!-- Price -->
                                <div class="text-lg font-bold text-gold whitespace-nowrap">
                                    ${{ number_format($item->price, 2) }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        @endforeach

    </main>

</body>
</html>