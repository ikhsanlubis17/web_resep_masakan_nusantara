@extends('layouts.app')

@section('title', 'Edit Resep - ' . $recipe->title)

@section('styles')
@include('recipes.partials.styles.form')
@endsection

@section('content')
@include('recipes.partials.form-header', ['title' => 'Edit Resep', 'subtitle' => 'Perbarui informasi resep "' . $recipe->title . '"'])
@include('recipes.partials.recipe-form', ['recipe' => $recipe, 'action' => route('recipes.update', $recipe), 'method' => 'PUT'])
@endsection

@section('scripts')
@include('recipes.partials.scripts.form')
@endsection
