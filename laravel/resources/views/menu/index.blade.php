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

    @include('menu.components.category-tabs', ['categories' => $categories])

    @include('menu.components.subcategory-bar', ['categories' => $categories])

    @include('menu.components.items-grid', ['categories' => $categories])

    @include('menu.components.cart')

    <div class="toast" id="toast"></div>

    <footer class="site-footer">
        <p class="site-footer-text">All rights reserved &copy; {{ date('Y') }} RESTO</p>
    </footer>

    <script src="{{ asset('menu.js') }}"></script>

</body>
</html>