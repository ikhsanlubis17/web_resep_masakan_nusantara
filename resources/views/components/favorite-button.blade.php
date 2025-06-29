@props(['recipe', 'size' => 'default'])

@php
    $isFavorited = auth()->check() && auth()->user()->favorites()->where('recipe_id', $recipe->id)->exists();
    $buttonClass = $size === 'small' ? 'favorite-btn-sm' : 'favorite-btn';
@endphp

<button 
    type="button" 
    class="{{ $buttonClass }} {{ $isFavorited ? 'favorited' : '' }}"
    onclick="handleFavoriteClick({{ $recipe->id }}, this, {{ auth()->check() ? 'true' : 'false' }})"
    data-bs-toggle="tooltip"
    data-bs-placement="top"
    title="{{ $isFavorited ? 'Hapus dari favorit' : 'Tambah ke favorit' }}"
>
    <i class="bi bi-{{ $isFavorited ? 'heart-fill' : 'heart' }} favorite-icon"></i>
</button>

@push('styles')
<style>
    .favorite-btn {
        position: relative;
        backdrop-filter: blur(4px);
    }
    
    .favorite-btn:hover {
        background: rgba(0,0,0,0.8) !important;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
    
    .favorite-btn:active {
        transform: scale(0.95);
    }
    
    .favorite-btn.favorited {
        background: rgba(220, 53, 69, 0.2) !important;
        box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.3);
    }
    
    .favorite-btn.favorited:hover {
        background: rgba(220, 53, 69, 0.3) !important;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
    }
    
    .favorite-btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
    }
    
    .favorite-icon {
        pointer-events: none;
    }
    
    .favorite-btn:active .favorite-icon {
        transform: scale(0.8);
    }
    
    .favorite-btn.favorited .favorite-icon {
        animation: heartBeat 0.6s ease-in-out;
    }
    
    @keyframes heartBeat {
        0% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1.1); }
        75% { transform: scale(1.25); }
        100% { transform: scale(1); }
    }
    
    /* Ripple effect for favorite button */
    .favorite-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.3s, height 0.3s;
    }
    
    .favorite-btn:active::before {
        width: 100%;
        height: 100%;
    }
    </style>
@endpush
