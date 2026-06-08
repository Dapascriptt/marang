@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Edit Barang</h1>
        <p class="text-muted mb-0">Perbarui data barang.</p>
    </div>

    <div class="card page-card">
        <div class="card-body">
            <form method="POST" action="{{ route('items.update', $item) }}">
                @method('PUT')
                @include('items._form', ['submitLabel' => 'Perbarui'])
            </form>
        </div>
    </div>
@endsection
