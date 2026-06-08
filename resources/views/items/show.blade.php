@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center mb-4">
        <div>
            <h1 class="h3 mb-1">Detail Barang</h1>
            <p class="text-muted mb-0">{{ $item->kode_barang }} - {{ $item->nama_barang }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('items.edit', $item) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>
    </div>

    <div class="card page-card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="text-muted small">Kode Barang</div>
                    <div class="fw-semibold">{{ $item->kode_barang }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Nama Barang</div>
                    <div class="fw-semibold">{{ $item->nama_barang }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Kategori</div>
                    <div>{{ $item->category->nama_kategori }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Stok</div>
                    <span class="badge {{ $item->stokBadgeClass() }}">
                        {{ $item->stok }} {{ $item->satuan }} - {{ $item->stokLabel() }}
                    </span>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Harga Beli</div>
                    <div>Rp {{ number_format((float) $item->harga_beli, 0, ',', '.') }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Harga Jual</div>
                    <div>Rp {{ number_format((float) $item->harga_jual, 0, ',', '.') }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Lokasi Penyimpanan</div>
                    <div>{{ $item->lokasi_penyimpanan ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted small">Terakhir Diperbarui</div>
                    <div>{{ $item->updated_at->format('d M Y H:i') }}</div>
                </div>
                <div class="col-12">
                    <div class="text-muted small">Keterangan</div>
                    <div>{{ $item->keterangan ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
