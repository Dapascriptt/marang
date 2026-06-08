<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_id',
        'stok',
        'satuan',
        'harga_beli',
        'harga_jual',
        'lokasi_penyimpanan',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'stok' => 'integer',
            'harga_beli' => 'decimal:2',
            'harga_jual' => 'decimal:2',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function stokBadgeClass(): string
    {
        if ($this->stok <= 0) {
            return 'text-bg-danger';
        }

        if ($this->stok <= 5) {
            return 'text-bg-warning';
        }

        return 'text-bg-success';
    }

    public function stokLabel(): string
    {
        if ($this->stok <= 0) {
            return 'Habis';
        }

        if ($this->stok <= 5) {
            return 'Rendah';
        }

        return 'Aman';
    }
}
