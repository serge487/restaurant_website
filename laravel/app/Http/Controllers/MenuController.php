<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with([
            'subcategories' => function ($query) {
                $query->where('is_active', true)
                      ->orderBy('sort_order')
                      ->with([
                          'menuItems' => function ($q) {
                              $q->where('is_available', true)
                                ->orderBy('name');
                          }
                      ]);
            }
        ])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        return view('menu.index', compact('categories'));
    }
}