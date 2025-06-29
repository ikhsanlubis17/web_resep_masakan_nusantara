<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controller untuk mengelola logika terkait Resep.
 */
class RecipeController extends Controller
{
    /**
     * Menampilkan semua resep yang disetujui dengan filter dan sorting.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $recipes = Recipe::with(['user', 'category', 'reviews'])
            ->where('status', 'approved')
            ->when(request('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%')
                    ->orWhere('ingredients', 'like', '%' . request('search') . '%');
            })
            ->when(request('category'), function ($query) {
                $query->where('category_id', request('category'));
            })
            ->when(request('difficulty'), function ($query) {
                $query->where('difficulty', request('difficulty'));
            })
            ->when(request('sort'), function ($query) {
                switch (request('sort')) {
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
                }
            }, function ($query) {
                $query->latest();
            })
            ->paginate(12);

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Menampilkan form tambah resep.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::active()->get();
        return view('recipes.create', compact('categories'));
    }

    /**
     * Menyimpan resep baru ke database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'prep_time' => 'required|integer|min:1',
            'cook_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'difficulty' => 'required|in:Mudah,Sedang,Sulit',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';
        $data['slug'] = Str::slug($request->title);

        // Ensure unique slug
        $originalSlug = $data['slug'];
        $counter = 1;
        while (Recipe::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter++;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        Recipe::create($data);

        return redirect()->route('my-recipes')->with('success', 'Resep berhasil dikirim untuk review admin!');
    }

    /**
     * Menampilkan daftar resep milik user saat ini.
     *
     * @return \Illuminate\View\View
     */
    public function myRecipes()
    {
        $recipes = Recipe::where('user_id', auth()->id())
            ->with(['category', 'reviews'])
            ->latest()
            ->paginate(12);

        return view('recipes.my-recipes', compact('recipes'));
    }

    /**
     * Menampilkan detail resep tertentu.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\View\View
     */
    public function show(Recipe $recipe)
    {
        if ($recipe->status !== 'approved' && $recipe->user_id !== auth()->id()) {
            abort(404);
        }

        // Increment views
        $recipe->increment('views');

        // Load relationships
        $recipe->load([
            'user',
            'category',
            'reviews' => function ($query) {
                $query->with('user')->latest();
            }
        ]);

        // Get related recipes
        $relatedRecipes = Recipe::where('category_id', $recipe->category_id)
            ->where('id', '!=', $recipe->id)
            ->where('status', 'approved')
            ->with(['user', 'category'])
            ->take(3)
            ->get();

        // Check if current user has already reviewed this recipe
        $userReview = null;
        if (auth()->check()) {
            $userReview = Review::where('user_id', auth()->id())
                ->where('recipe_id', $recipe->id)
                ->first();
        }

        return view('recipes.show', compact('recipe', 'relatedRecipes', 'userReview'));
    }

    /**
     * Menampilkan form edit resep.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\View\View
     */
    public function edit(Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        $categories = Category::active()->get();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Memperbarui resep di database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'prep_time' => 'required|integer|min:1',
            'cook_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'difficulty' => 'required|in:Mudah,Sedang,Sulit',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($recipe->status === 'approved') {
            $data['status'] = 'pending';
            $data['admin_notes'] = null;
            $data['approved_at'] = null;
            $data['approved_by'] = null;
        }

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe->update($data);

        return redirect()->route('recipes.show', $recipe)->with('success', 'Resep berhasil diupdate dan dikirim untuk review ulang!');
    }

    /**
     * Menghapus resep milik user.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route('my-recipes')->with('success', 'Resep berhasil dihapus!');
    }
}