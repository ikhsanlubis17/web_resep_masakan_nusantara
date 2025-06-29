@extends('layouts.app')

@section('title', 'Semua Resep')

@section('styles')
@include('recipes.partials.styles.index')
@endsection

@section('content')
@include('recipes.partials.index-header')
@include('recipes.partials.filter-section')
@include('recipes.partials.recipes-grid')
@endsection

@section('scripts')
@include('recipes.partials.scripts.index')
@endsection
