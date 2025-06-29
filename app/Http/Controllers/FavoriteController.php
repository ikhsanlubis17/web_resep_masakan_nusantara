<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    /**
     * Middleware auth agar hanya user login yang bisa mengakses
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar resep favorit milik user.
     *
     * @return View
     */
    public function index(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $favorites = $user->favorites()
            ->with(['recipe.user', 'recipe.category'])
            ->latest()
            ->paginate(12);

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Menambahkan atau menghapus resep dari favorit.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function toggle(int $id): JsonResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        try {
            $recipe = Recipe::find($id);

            if (!$recipe) {
                return response()->json([
                    'success' => false,
                    'message' => 'Resep tidak ditemukan atau sudah dihapus.'
                ], 404);
            }

            // Cek apakah sudah difavoritkan
            $favorite = $user->favorites()->where('recipe_id', $recipe->id)->first();

            if ($favorite) {
                $favorite->delete();
                $favorited = false;
                $message = 'Resep dihapus dari favorit.';
            } else {
                $user->favorites()->create(['recipe_id' => $recipe->id]);
                $favorited = true;
                $message = 'Resep ditambahkan ke favorit! ❤️';
            }

            $favoritesCount = $recipe->fresh()->favorites()->count();

            return response()->json([
                'success' => true,
                'favorited' => $favorited,
                'favorites_count' => $favoritesCount,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            Log::error('Favorite toggle error: ' . $e->getMessage(), [
                'recipe_id' => $id,
                'user_id' => $user->id,
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }
}