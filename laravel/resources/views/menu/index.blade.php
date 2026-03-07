<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTO | Digital Menu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('menu.css') }}">
</head>
<body>

    @include('menu.components.header')

    <!-- Added container wrapper here -->
    <main class="menu-container">
        @include('menu.components.category-tabs', ['categories' => $categories])

        @include('menu.components.subcategory-bar', ['categories' => $categories])

        @include('menu.components.items-grid', ['categories' => $categories])
    </main>

<!-- Floating Action Buttons Container -->
<div class="floating-actions">
    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
    </button>

    <!-- Your existing Cart component -->
    @include('menu.components.cart')
</div>
    <div class="toast" id="toast"></div>

    <footer class="site-footer">
        <p class="site-footer-text">All rights reserved &copy; {{ date('Y') }} RESTO</p>
    </footer>

    <script src="{{ asset('menu.js') }}"></script>

</body>
</html>