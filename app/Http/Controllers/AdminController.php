<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_recipes' => Recipe::count(),
            'pending_recipes' => Recipe::where('status', 'pending')->count(),
            'approved_recipes' => Recipe::where('status', 'approved')->count(),
            'rejected_recipes' => Recipe::where('status', 'rejected')->count(),
        ];

        $pending_recipes = Recipe::with('user', 'category')
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        $recent_users = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'pending_recipes', 'recent_users'));
    }

    public function recipes()
    {
        $recipes = Recipe::with('user', 'category')
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%');
            })
            ->latest()
            ->paginate(20);

        return view('admin.recipes.index', compact('recipes'));
    }

    public function approveRecipe(Recipe $recipe)
    {
        $recipe->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Resep berhasil disetujui!');
    }

    public function rejectRecipe(Request $request, Recipe $recipe)
    {
        $request->validate([
            'admin_notes' => 'required|string|max:500'
        ]);

        $recipe->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes,
            'approved_by' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Resep berhasil ditolak!');
    }

    public function users()
    {
        $users = User::when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        })
            ->when(request('role'), function ($query) {
                $query->where('role', request('role'));
            })
            ->latest()
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil dibuat!');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
            'is_active' => 'boolean',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'User berhasil diupdate!');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}