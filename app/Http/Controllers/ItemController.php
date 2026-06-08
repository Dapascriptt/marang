<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');
        $categoryId = $request->query('kategori_id');

        $items = Item::with('category')
            ->when($search, function ($query, string $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('nama_barang', 'like', "%{$search}%")
                        ->orWhere('kode_barang', 'like', "%{$search}%");
                });
            })
            ->when($categoryId, function ($query, string $categoryId): void {
                $query->where('kategori_id', $categoryId);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('nama_kategori')->get();

        return view('items.index', compact('items', 'categories', 'search', 'categoryId'));
    }

    public function create(): View
    {
        return view('items.create', [
            'categories' => Category::orderBy('nama_kategori')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateItem($request);

        Item::create($data);

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Item $item): View
    {
        $item->load('category');

        return view('items.show', compact('item'));
    }

    public function edit(Item $item): View
    {
        return view('items.edit', [
            'item' => $item,
            'categories' => Category::orderBy('nama_kategori')->get(),
        ]);
    }

    public function update(Request $request, Item $item): RedirectResponse
    {
        $data = $this->validateItem($request, $item);

        $item->update($data);

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil dihapus.');
    }

    private function validateItem(Request $request, ?Item $item = null): array
    {
        return $request->validate([
            'kode_barang' => [
                'required',
                'string',
                'max:255',
                Rule::unique('items', 'kode_barang')->ignore($item),
            ],
            'nama_barang' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'exists:categories,id'],
            'stok' => ['required', 'integer', 'min:0'],
            'satuan' => ['required', 'string', 'max:50'],
            'harga_beli' => ['required', 'numeric', 'min:0'],
            'harga_jual' => ['required', 'numeric', 'min:0'],
            'lokasi_penyimpanan' => ['nullable', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]);
    }
}
