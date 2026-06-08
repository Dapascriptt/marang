@csrf

<div class="row g-3">
    <div class="col-md-4">
        <label for="kode_barang" class="form-label">Kode Barang</label>
        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $item->kode_barang ?? '') }}" required>
        @error('kode_barang')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang ?? '') }}" required>
        @error('nama_barang')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
            <option value="">Pilih kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) old('kategori_id', $item->kategori_id ?? '') === (string) $category->id)>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" min="0" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $item->stok ?? 0) }}" required>
        @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="satuan" class="form-label">Satuan</label>
        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{ old('satuan', $item->satuan ?? '') }}" placeholder="Unit, Pcs, Botol" required>
        @error('satuan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="harga_beli" class="form-label">Harga Beli</label>
        <input type="number" min="0" step="0.01" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $item->harga_beli ?? 0) }}" required>
        @error('harga_beli')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="harga_jual" class="form-label">Harga Jual</label>
        <input type="number" min="0" step="0.01" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $item->harga_jual ?? 0) }}" required>
        @error('harga_jual')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="lokasi_penyimpanan" class="form-label">Lokasi Penyimpanan</label>
        <input type="text" class="form-control @error('lokasi_penyimpanan') is-invalid @enderror" id="lokasi_penyimpanan" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $item->lokasi_penyimpanan ?? '') }}">
        @error('lokasi_penyimpanan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $item->keterangan ?? '') }}</textarea>
        @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
