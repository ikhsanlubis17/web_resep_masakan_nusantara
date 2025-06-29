<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $categories = Category::active()
            ->withCount(['recipes' => function ($query) {
                $query->published();
            }])
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Display recipes in a specific category
     */
    public function show(Category $category, Request $request)
    {
        try {
            $query = Recipe::where('category_id', $category->id)
                ->with(['user', 'category'])
                ->published();

            // Search functionality
            if ($request->filled('search')) {
                $searchTerm = $request->get('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('ingredients', 'like', '%' . $searchTerm . '%')
                        ->orWhere('tags', 'like', '%' . $searchTerm . '%');
                });
            }

            // Filter by difficulty
            if ($request->filled('difficulty')) {
                $query->where('difficulty', $request->get('difficulty'));
            }

            // Sorting
            $sort = $request->get('sort', 'latest');
            switch ($sort) {
                case 'popular':
                    $query->orderBy('views', 'desc');
                    break;
                case 'rating':
                    $query->orderBy('rating', 'desc');
                    break;
                case 'name':
                    $query->orderBy('title', 'asc');
                    break;
                default:
                    $query->latest();
                    break;
            }

            $recipes = $query->paginate(12);

            return view('categories.show', compact('category', 'recipes'));
        } catch (\Exception $e) {
            \Log::error('Category show error: ' . $e->getMessage());

            // If there's an error, return with empty recipes collection
            $recipes = Recipe::where('id', 0)->paginate(12); // Empty collection

            return view('categories.show', compact('category', 'recipes'))
                ->with('error', 'Terjadi kesalahan saat memuat resep. Silakan coba lagi.');
        }
    }
}