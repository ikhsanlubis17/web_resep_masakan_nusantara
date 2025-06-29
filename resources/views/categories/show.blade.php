@extends('layouts.app')

@section('title', $category->name . ' - Kategori Resep')

@section('styles')
@include('categories.partials.styles.show')
@endsection

@section('content')
@include('categories.partials.category-header')
@include('categories.partials.filter-section')
@include('categories.partials.recipes-grid')
@endsection

@section('scripts')
@include('categories.partials.scripts.show')
@endsection
