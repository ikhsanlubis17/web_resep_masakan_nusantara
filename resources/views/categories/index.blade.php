@extends('layouts.app')

@section('title', 'Kategori Resep')

@section('styles')
@include('categories.partials.styles.index')
@endsection

@section('content')
@include('categories.partials.header')
@include('categories.partials.categories-grid')
@include('categories.partials.statistics')
@include('categories.partials.popular-categories')
@include('categories.partials.cta-section')
@endsection

@section('scripts')
@include('categories.partials.scripts.index')
@endsection
