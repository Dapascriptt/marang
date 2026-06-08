@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Edit Kategori</h1>
        <p class="text-muted mb-0">Perbarui data kategori.</p>
    </div>

    <div class="card page-card">
        <div class="card-body">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @method('PUT')
                @include('categories._form', ['submitLabel' => 'Perbarui'])
            </form>
        </div>
    </div>
@endsection
