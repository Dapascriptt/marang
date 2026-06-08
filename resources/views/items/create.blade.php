@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Tambah Barang</h1>
        <p class="text-muted mb-0">Isi data barang baru.</p>
    </div>

    <div class="card page-card">
        <div class="card-body">
            <form method="POST" action="{{ route('items.store') }}">
                @include('items._form', ['submitLabel' => 'Simpan'])
            </form>
        </div>
    </div>
@endsection
