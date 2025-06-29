@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <h1 class="fw-bold text-dark mb-2">
            <i class="bi bi-person-circle text-primary me-2"></i>
            Profil Saya
        </h1>
        <p class="text-muted">Lihat informasi dasar akun Anda</p>
    </div>

    <!-- User Info Card -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-body text-center">
                    <img src="{{ $user->avatar_url ?? '/default-avatar.png' }}" alt="Foto Profil" class="profile-avatar mb-3">
                    <h4 class="fw-bold">{{ $user->name }}</h4>
                    <p class="text-muted mb-1">{{ $user->email }}</p>
                    @if($user->bio)
                        <p class="mt-3 text-dark">{{ $user->bio }}</p>
                    @endif
                </div>
                <div class="card-footer bg-white d-flex justify-content-between">
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                        <i class="bi bi-pencil me-1"></i> Edit Profil
                    </a>
                    <a href="{{ route('profile.edit-password') }}" class="btn btn-outline-warning">
                        <i class="bi bi-key me-1"></i> Ubah Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
