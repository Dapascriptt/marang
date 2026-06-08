<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ],
        );

        $categories = [
            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Barang elektronik dan perlengkapannya.',
            ],
            [
                'nama_kategori' => 'Alat Tulis',
                'deskripsi' => 'Perlengkapan tulis kantor dan sekolah.',
            ],
            [
                'nama_kategori' => 'Kebersihan',
                'deskripsi' => 'Peralatan dan bahan kebersihan.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['nama_kategori' => $category['nama_kategori']],
                $category,
            );
        }

        $elektronik = Category::where('nama_kategori', 'Elektronik')->first();
        $alatTulis = Category::where('nama_kategori', 'Alat Tulis')->first();
        $kebersihan = Category::where('nama_kategori', 'Kebersihan')->first();

        $items = [
            [
                'kode_barang' => 'BRG-001',
                'nama_barang' => 'Mouse Wireless',
                'kategori_id' => $elektronik->id,
                'stok' => 12,
                'satuan' => 'Unit',
                'harga_beli' => 75000,
                'harga_jual' => 95000,
                'lokasi_penyimpanan' => 'Rak A1',
                'keterangan' => 'Mouse untuk kebutuhan kantor.',
            ],
            [
                'kode_barang' => 'BRG-002',
                'nama_barang' => 'Buku Catatan',
                'kategori_id' => $alatTulis->id,
                'stok' => 5,
                'satuan' => 'Pcs',
                'harga_beli' => 8000,
                'harga_jual' => 12000,
                'lokasi_penyimpanan' => 'Rak B2',
                'keterangan' => 'Buku catatan ukuran A5.',
            ],
            [
                'kode_barang' => 'BRG-003',
                'nama_barang' => 'Cairan Pembersih Lantai',
                'kategori_id' => $kebersihan->id,
                'stok' => 0,
                'satuan' => 'Botol',
                'harga_beli' => 18000,
                'harga_jual' => 25000,
                'lokasi_penyimpanan' => 'Gudang C',
                'keterangan' => 'Stok perlu segera ditambah.',
            ],
        ];

        foreach ($items as $item) {
            Item::updateOrCreate(
                ['kode_barang' => $item['kode_barang']],
                $item,
            );
        }
    }
}
