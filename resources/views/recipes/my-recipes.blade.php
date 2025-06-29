@extends('layouts.app')

@section('title', 'Resep Saya')

@section('styles')
@include('recipes.partials.styles.my-recipes')
@endsection

@section('content')
@include('recipes.partials.my-recipes-header')
@include('recipes.partials.my-recipes-grid')
@include('recipes.partials.delete-modal')
@endsection

@section('scripts')
@include('recipes.partials.scripts.my-recipes')
@endsection
