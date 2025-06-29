<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $stats = [
            'total_recipes' => Recipe::count(),
            'total_users' => User::where('role', 'user')->count(),
            'total_categories' => Category::count(),
            'featured_recipes' => Recipe::where('is_featured', true)->count(),
        ];

        $latestRecipes = Recipe::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        $latestUsers = User::where('role', 'user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestRecipes', 'latestUsers'));
    }
}