<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Fetch active categories, and only load available menu items
        $categories = Category::with(['menuItems' => function ($query) {
            $query->where('is_available', true);
        }])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        return view('menu.index', compact('categories'));
    }
}
