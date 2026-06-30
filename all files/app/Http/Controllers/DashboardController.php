<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total' => Product::count(),
            'active' => Product::where('is_active', true)->count(),
            'low_stock' => Product::where('quantity', '<', 10)->count(),
            'total_value' => Product::selectRaw('SUM(price * quantity) as value')->value('value') ?? 0,
        ];

        $recentProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentProducts'));
    }
}
