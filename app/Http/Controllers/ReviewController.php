<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'recipe_id' => 'required|exists:recipes,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000'
            ], [
                'recipe_id.required' => 'Recipe ID is required',
                'recipe_id.exists' => 'Recipe not found',
                'rating.required' => 'Rating is required',
                'rating.integer' => 'Rating must be a number',
                'rating.min' => 'Rating must be at least 1',
                'rating.max' => 'Rating must be at most 5',
                'comment.max' => 'Comment must not exceed 1000 characters'
            ]);

            // Cek apakah user sudah pernah review resep ini
            $existingReview = Review::where('user_id', Auth::id())
                ->where('recipe_id', $validated['recipe_id'])
                ->first();

            if ($existingReview) {
                return back()->with('error', 'Anda sudah memberikan ulasan untuk resep ini.');
            }

            // Cek apakah resep ada dan disetujui
            $recipe = Recipe::where('id', $validated['recipe_id'])
                ->where('status', 'approved')
                ->first();

            if (!$recipe) {
                return back()->with('error', 'Resep tidak ditemukan atau belum disetujui.');
            }

            // Buat review baru dalam transaction
            DB::transaction(function () use ($validated) {
                $review = Review::create([
                    'user_id' => Auth::id(),
                    'recipe_id' => $validated['recipe_id'],
                    'rating' => $validated['rating'],
                    'comment' => $validated['comment']
                ]);

                // Update rating rata-rata resep
                $this->updateRecipeRating($validated['recipe_id']);
            });

            return back()->with('success', 'Terima kasih! Ulasan Anda berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Review store error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'recipe_id' => $request->recipe_id,
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menyimpan ulasan. Silakan coba lagi.');
        }
    }

    public function update(Request $request, Review $review)
    {
        // Pastikan user hanya bisa edit review miliknya
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $validated = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000'
            ]);

            DB::transaction(function () use ($review, $validated) {
                $review->update($validated);
                $this->updateRecipeRating($review->recipe_id);
            });

            return back()->with('success', 'Ulasan berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Review update error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui ulasan.');
        }
    }

    public function destroy(Review $review)
    {
        // Pastikan user hanya bisa hapus review miliknya
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $recipeId = $review->recipe_id;

            DB::transaction(function () use ($review, $recipeId) {
                $review->delete();
                $this->updateRecipeRating($recipeId);
            });

            return back()->with('success', 'Ulasan berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Review delete error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus ulasan.');
        }
    }

    private function updateRecipeRating($recipeId)
    {
        $recipe = Recipe::find($recipeId);
        if ($recipe) {
            $averageRating = Review::where('recipe_id', $recipeId)->avg('rating');
            $reviewCount = Review::where('recipe_id', $recipeId)->count();

            $recipe->update([
                'rating' => $averageRating ? round($averageRating, 1) : 0,
                'reviews_count' => $reviewCount
            ]);
        }
    }
}