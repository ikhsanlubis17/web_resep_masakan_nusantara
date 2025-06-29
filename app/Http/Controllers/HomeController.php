<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\User; // Tambahkan ini
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        // Get featured recipes (latest 3)
        $featuredRecipes = Recipe::with(['user', 'category'])
            ->published()
            ->latest()
            ->limit(3)
            ->get();

        // Get popular recipes (most viewed)
        $popularRecipes = Recipe::with(['user', 'category'])
            ->published()
            ->orderBy('views', 'desc')
            ->limit(4)
            ->get();

        // Get all categories with recipe count
        $categories = Category::active()
            ->withCount(['recipes' => function ($query) {
                $query->published();
            }])
            ->get();

        // 🔥 Statistik dinamis
        $totalRecipes = Recipe::published()->count();
        $totalUsers = User::count();
        $averageRating = Recipe::published()->avg('rating') ?? 4.9;

        return view('beranda.home', compact(
            'featuredRecipes',
            'popularRecipes',
            'categories',
            'totalRecipes',
            'totalUsers',
            'averageRating'
        ));
    }
}