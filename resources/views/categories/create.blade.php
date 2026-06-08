@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Tambah Kategori</h1>
        <p class="text-muted mb-0">Isi data kategori baru.</p>
    </div>

    <div class="card page-card">
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}">
                @include('categories._form', ['submitLabel' => 'Simpan'])
            </form>
        </div>
    </div>
@endsection
