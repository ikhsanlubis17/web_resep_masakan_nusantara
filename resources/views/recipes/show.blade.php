@extends('layouts.app')

@section('title', $recipe->title)

@section('styles')
@include('recipes.partials.styles.show')
@endsection

@section('content')
@include('recipes.partials.recipe-breadcrumb')

<div class="container py-5">
    <div class="row g-5 align-items-start">
        <!-- Main Content -->
        <div class="col-lg-8">
            @include('recipes.partials.recipe-header')
            @include('recipes.partials.recipe-info')
            @include('recipes.partials.recipe-ingredients')
            @include('recipes.partials.recipe-instructions')
            @include('recipes.partials.recipe-actions')
            @include('recipes.partials.recipe-reviews')
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            @include('recipes.partials.recipe-sidebar')
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('recipes.partials.scripts.show')
@include('recipes.partials.scripts.debug-rating')
@endsection
