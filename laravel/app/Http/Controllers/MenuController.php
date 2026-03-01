<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // We fetch Categories -> their Subcategories -> their MenuItems
        // We filter for only 'is_active' and 'is_available' items
        $categories = Category::with(['subcategories' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            }, 'subcategories.menuItems' => function ($query) {
                $query->where('is_available', true);
            }])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('menu.index', compact('categories'));
    }
}