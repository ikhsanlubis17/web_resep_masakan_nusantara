<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===================
// 📌 PUBLIC ROUTES
// ===================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']); // Redirect /home ke beranda

// Kategori
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Pencarian
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Resep (public view)
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

// ==========================
// 🔐 AUTHENTICATED ROUTES
// ==========================

Route::middleware(['auth'])->group(function () {
    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Ubah Password
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Resep milik pengguna
    Route::get('/my-recipes', [RecipeController::class, 'myRecipes'])->name('my-recipes');

    // CRUD Resep
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Favorit resep
    Route::post('/recipes/{id}/favorite', [FavoriteController::class, 'toggle'])->name('recipes.favorite');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// ==========================
// 🔒 ADMIN ROUTES
// ==========================

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Manajemen Resep
    Route::get('/recipes', [AdminController::class, 'recipes'])->name('recipes');
    Route::post('/recipes/{recipe}/approve', [AdminController::class, 'approveRecipe'])->name('recipes.approve');
    Route::post('/recipes/{recipe}/reject', [AdminController::class, 'rejectRecipe'])->name('recipes.reject');

    // Manajemen User
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
});

// ==========================
// 🧾 AUTH ROUTES (Login/Register)
// ==========================

Auth::routes();