<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard.index', [
            'totalBarang' => Item::count(),
            'totalKategori' => Category::count(),
            'totalStok' => Item::sum('stok'),
            'stokRendah' => Item::where('stok', '<=', 5)->count(),
            'barangStokRendah' => Item::with('category')
                ->where('stok', '<=', 5)
                ->orderBy('stok')
                ->limit(5)
                ->get(),
        ]);
    }
}
