@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pengguna</h1>
        <div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary me-2">
                <i class="bi bi-person-plus me-2"></i>Tambah User
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Dashboard
            </a>
        </div>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" 
                           value="{{ request('search') }}" placeholder="Cari nama atau email...">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="role">
                        <option value="">Semua Role</option>
                        <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Bergabung</th>
                            <th>Resep</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" 
                                         class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>
                                        <div class="fw-bold">{{ $user->name }}</div>
                                        <small class="text-muted">#{{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                                    {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>{{ $user->recipes()->count() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="bi bi-people display-4 text-muted"></i>
                                <p class="text-muted mt-2">Tidak ada pengguna ditemukan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
