@extends('layouts.app')

@section('title', 'Tambah Resep Baru')

@section('styles')
@include('recipes.partials.styles.form')
@endsection

@section('content')
@include('recipes.partials.form-header', ['title' => 'Tambah Resep Baru', 'subtitle' => 'Bagikan resep masakan tradisional Indonesia Anda dengan komunitas'])
@include('recipes.partials.recipe-form', ['recipe' => null, 'action' => route('recipes.store'), 'method' => 'POST'])
@endsection

@section('scripts')
@include('recipes.partials.scripts.form')
@endsection
