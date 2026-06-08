@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center mb-4">
        <div>
            <h1 class="h3 mb-1">Dashboard</h1>
            <p class="text-muted mb-0">Ringkasan data inventory.</p>
        </div>
        <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Barang</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card page-card h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Barang</p>
                    <h2 class="h3 mb-0">{{ number_format($totalBarang) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card page-card h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Kategori</p>
                    <h2 class="h3 mb-0">{{ number_format($totalKategori) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card page-card h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Stok</p>
                    <h2 class="h3 mb-0">{{ number_format($totalStok) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card page-card h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Barang Stok Rendah</p>
                    <h2 class="h3 mb-0">{{ number_format($stokRendah) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card page-card">
        <div class="card-header bg-white">
            <h2 class="h5 mb-0">Daftar Stok Rendah</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangStokRendah as $item)
                            <tr>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->category->nama_kategori }}</td>
                                <td>
                                    <span class="badge {{ $item->stokBadgeClass() }}">
                                        {{ $item->stok }} {{ $item->satuan }} - {{ $item->stokLabel() }}
                                    </span>
                                </td>
                                <td>{{ $item->lokasi_penyimpanan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Tidak ada barang stok rendah.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
