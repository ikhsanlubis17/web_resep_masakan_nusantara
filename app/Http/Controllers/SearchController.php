<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display search results
     */
    public function index(Request $request)
    {
        $query = $request->get('q');
        $categoryId = $request->get('category');
        $difficulty = $request->get('difficulty');

        $recipes = Recipe::with(['user', 'category'])
            ->published();

        // Search by title or description
        if ($query) {
            $recipes->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('ingredients', 'like', '%' . $query . '%')
                    ->orWhere('tags', 'like', '%' . $query . '%');
            });
        }

        // Filter by category
        if ($categoryId) {
            $recipes->where('category_id', $categoryId);
        }

        // Filter by difficulty
        if ($difficulty) {
            $recipes->where('difficulty', $difficulty);
        }

        $recipes = $recipes->latest()->paginate(12);

        // Get categories for filter
        $categories = Category::active()->orderBy('name')->get();

        return view('search.index', compact('recipes', 'categories', 'query', 'categoryId', 'difficulty'));
    }
}