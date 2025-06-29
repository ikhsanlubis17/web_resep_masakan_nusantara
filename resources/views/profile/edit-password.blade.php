@extends('layouts.app')

@section('title', 'Ubah Password')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile.show') }}">Profil</a></li>
                <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
        </nav>
        
        <h1 class="fw-bold text-dark mb-2">
            <i class="bi bi-key text-warning me-2"></i>
            Ubah Password
        </h1>
        <p class="text-muted">Perbarui password akun Anda untuk keamanan yang lebih baik</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="main-content">
                <form action="{{ route('profile.update-password') }}" method="POST" id="passwordForm">
                    @csrf
                    @method('PUT')
                    
                    <!-- Current Password -->
                    <div class="mb-4">
                        <label for="current_password" class="form-label">Password Saat Ini <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" name="current_password" 
                                   placeholder="Masukkan password saat ini">
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="current_password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Password Baru <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" 
                                   placeholder="Masukkan password baru">
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        
                        <!-- Password Strength Indicator -->
                        <div class="mt-2">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" id="password-strength" role="progressbar" style="width: 0%"></div>
                            </div>
                            <small id="password-strength-text" class="text-muted">Kekuatan password</small>
                        </div>
                        
                        <!-- Password Requirements -->
                        <div class="mt-2">
                            <small class="text-muted">Password harus memenuhi kriteria:</small>
                            <ul class="small text-muted mt-1">
                                <li id="length-check">Minimal 8 karakter</li>
                                <li id="uppercase-check">Mengandung huruf besar</li>
                                <li id="lowercase-check">Mengandung huruf kecil</li>
                                <li id="number-check">Mengandung angka</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" 
                                   placeholder="Ulangi password baru">
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div id="password-match" class="mt-1"></div>
                    </div>

                    <!-- Security Tips -->
                    <div class="alert alert-info">
                        <h6 class="alert-heading"><i class="bi bi-shield-check me-2"></i>Tips Keamanan</h6>
                        <ul class="mb-0 small">
                            <li>Gunakan kombinasi huruf besar, kecil, angka, dan simbol</li>
                            <li>Hindari menggunakan informasi pribadi yang mudah ditebak</li>
                            <li>Jangan gunakan password yang sama dengan akun lain</li>
                            <li>Ubah password secara berkala untuk keamanan optimal</li>
                        </ul>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-warning btn-lg" id="submit-btn" disabled>
                            <i class="bi bi-check-circle me-2"></i>Update Password
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
    // Toggle Password Visibility
    $('.toggle-password').click(function() {
        const target = $(this).data('target');
        const input = $('#' + target);
        const icon = $(this).find('i');
        
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        }
    });

    // Password Strength Checker
    $('#password').on('input', function() {
        const password = $(this).val();
        const strength = checkPasswordStrength(password);
        updatePasswordStrength(strength);
        checkPasswordRequirements(password);
        checkPasswordMatch();
    });

    // Password Confirmation Checker
    $('#password_confirmation').on('input', function() {
        checkPasswordMatch();
    });

    function checkPasswordStrength(password) {
        let score = 0;
        
        if (password.length >= 8) score++;
        if (password.match(/[a-z]/)) score++;
        if (password.match(/[A-Z]/)) score++;
        if (password.match(/[0-9]/)) score++;
        if (password.match(/[^a-zA-Z0-9]/)) score++;
        
        return score;
    }

    function updatePasswordStrength(strength) {
        const progressBar = $('#password-strength');
        const strengthText = $('#password-strength-text');
        
        let width, color, text;
        
        switch (strength) {
            case 0:
            case 1:
                width = '20%';
                color = 'bg-danger';
                text = 'Sangat Lemah';
                break;
            case 2:
                width = '40%';
                color = 'bg-warning';
                text = 'Lemah';
                break;
            case 3:
                width = '60%';
                color = 'bg-info';
                text = 'Sedang';
                break;
            case 4:
                width = '80%';
                color = 'bg-primary';
                text = 'Kuat';
                break;
            case 5:
                width = '100%';
                color = 'bg-success';
                text = 'Sangat Kuat';
                break;
        }
        
        progressBar.css('width', width).removeClass().addClass('progress-bar ' + color);
        strengthText.text(text);
    }

    function checkPasswordRequirements(password) {
        const requirements = {
            'length-check': password.length >= 8,
            'uppercase-check': /[A-Z]/.test(password),
            'lowercase-check': /[a-z]/.test(password),
            'number-check': /[0-9]/.test(password)
        };
        
        Object.keys(requirements).forEach(function(id) {
            const element = $('#' + id);
            if (requirements[id]) {
                element.removeClass('text-muted').addClass('text-success');
                element.prepend('<i class="bi bi-check-circle me-1"></i>');
            } else {
                element.removeClass('text-success').addClass('text-muted');
                element.find('i').remove();
            }
        });
        
        // Enable submit button if all requirements are met
        const allMet = Object.values(requirements).every(Boolean);
        $('#submit-btn').prop('disabled', !allMet || !checkPasswordMatch(true));
    }

    function checkPasswordMatch(returnValue = false) {
        const password = $('#password').val();
        const confirmation = $('#password_confirmation').val();
        const matchDiv = $('#password-match');
        
        if (confirmation === '') {
            matchDiv.html('');
            if (returnValue) return false;
            return;
        }
        
        if (password === confirmation) {
            matchDiv.html('<small class="text-success"><i class="bi bi-check-circle me-1"></i>Password cocok</small>');
            if (returnValue) return true;
        } else {
            matchDiv.html('<small class="text-danger"><i class="bi bi-x-circle me-1"></i>Password tidak cocok</small>');
            if (returnValue) return false;
        }
        
        // Update submit button state
        const passwordValid = checkPasswordStrength($('#password').val()) >= 3;
        const passwordsMatch = password === confirmation && confirmation !== '';
        $('#submit-btn').prop('disabled', !(passwordValid && passwordsMatch));
    }

    // Form Validation
    $('#passwordForm').submit(function(e) {
        const currentPassword = $('#current_password').val();
        const newPassword = $('#password').val();
        const confirmPassword = $('#password_confirmation').val();
        
        if (!currentPassword || !newPassword || !confirmPassword) {
            e.preventDefault();
            showToast('Mohon lengkapi semua field', 'error');
            return false;
        }
        
        if (newPassword !== confirmPassword) {
            e.preventDefault();
            showToast('Password baru dan konfirmasi tidak cocok', 'error');
            return false;
        }
        
        if (checkPasswordStrength(newPassword) < 3) {
            e.preventDefault();
            showToast('Password terlalu lemah. Gunakan kombinasi huruf, angka, dan simbol', 'error');
            return false;
        }
    });
});
</script>
@endpush
