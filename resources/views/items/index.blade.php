@extends('layouts.app')

@section('title', 'Barang')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center mb-4">
        <div>
            <h1 class="h3 mb-1">Barang</h1>
            <p class="text-muted mb-0">Kelola data barang inventory.</p>
        </div>
        <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Barang</a>
    </div>

    <div class="card page-card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('items.index') }}" class="row g-2">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Cari nama atau kode barang">
                </div>
                <div class="col-md-4">
                    <select name="kategori_id" class="form-select">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) $categoryId === (string) $category->id)>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">Filter</button>
                    <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card page-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Lokasi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->kode_barang }}</td>
                                <td class="fw-semibold">{{ $item->nama_barang }}</td>
                                <td>{{ $item->category->nama_kategori }}</td>
                                <td>
                                    <span class="badge {{ $item->stokBadgeClass() }}">
                                        {{ $item->stok }} {{ $item->satuan }} - {{ $item->stokLabel() }}
                                    </span>
                                </td>
                                <td>Rp {{ number_format((float) $item->harga_jual, 0, ',', '.') }}</td>
                                <td>{{ $item->lokasi_penyimpanan ?? '-' }}</td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                                        <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form method="POST" action="{{ route('items.destroy', $item) }}" onsubmit="return confirm('Hapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Data barang tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($items->hasPages())
            <div class="card-footer bg-white">
                {{ $items->links() }}
            </div>
        @endif
    </div>
@endsection
