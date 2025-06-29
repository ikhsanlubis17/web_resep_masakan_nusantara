@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile.show') }}">Profil</a></li>
                <li class="breadcrumb-item active">Edit Profil</li>
            </ol>
        </nav>
        
        <h1 class="fw-bold text-dark mb-2">
            <i class="bi bi-pencil text-warning me-2"></i>
            Edit Profil
        </h1>
        <p class="text-muted">Perbarui informasi profil Anda</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="main-content">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Current Avatar -->
                    <div class="text-center mb-4">
                        <img src="{{ auth()->user()->avatar_url }}" alt="Current Avatar" 
                             class="profile-avatar mb-3" id="current-avatar">
                        <h5 class="text-dark">{{ auth()->user()->name }}</h5>
                    </div>

                    <!-- Avatar Upload -->
                    <div class="mb-4">
                        <label for="avatar" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                               id="avatar" name="avatar" accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
                        
                        <!-- Preview -->
                        <div id="avatar-preview" class="mt-3 text-center" style="display: none;">
                            <img id="preview-avatar" src="/placeholder.svg" alt="Preview" class="profile-avatar">
                            <p class="text-muted small mt-2">Preview foto baru</p>
                        </div>
                    </div>

                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h4 class="fw-bold text-primary mb-3">Informasi Dasar</h4>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', auth()->user()->name) }}" 
                                   placeholder="Masukkan nama lengkap Anda">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', auth()->user()->email) }}" 
                                   placeholder="Masukkan alamat email Anda">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" name="bio" rows="4" 
                                      placeholder="Ceritakan sedikit tentang diri Anda...">{{ old('bio', auth()->user()->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Maksimal 500 karakter.</div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="bi bi-check-circle me-2"></i>Update Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Avatar Preview
    $('#avatar').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-avatar').attr('src', e.target.result);
                $('#avatar-preview').show();
            };
            reader.readAsDataURL(file);
        } else {
            $('#avatar-preview').hide();
        }
    });
});
</script>
@endpush
