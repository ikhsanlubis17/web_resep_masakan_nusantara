@extends('layouts.app')

@section('title', 'Beranda')

@section('styles')
@include('beranda.partials.styles')
@endsection

@section('content')
@include('beranda.partials.hero-section')
@include('beranda.partials.categories-section')
@include('beranda.partials.featured-recipes')
@include('beranda.partials.popular-recipes')
@include('beranda.partials.cta-section')
@endsection

@section('scripts')
@include('beranda.partials.scripts')
@endsection
