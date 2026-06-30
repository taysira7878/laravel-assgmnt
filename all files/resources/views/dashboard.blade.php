@extends('layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('header-actions')
    <a href="{{ route('products.create') }}"
       class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-violet-500 to-pink-500 px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-violet-300/50 transition hover:scale-[1.02] hover:shadow-xl">
        <span>➕</span> New Product
    </a>
@endsection

@section('content')
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['label' => 'Total Products', 'value' => $stats['total'], 'emoji' => '📦', 'color' => 'from-violet-400 to-purple-500'],
            ['label' => 'Active Products', 'value' => $stats['active'], 'emoji' => '✨', 'color' => 'from-emerald-400 to-teal-500'],
            ['label' => 'Low Stock', 'value' => $stats['low_stock'], 'emoji' => '⚡', 'color' => 'from-amber-400 to-orange-500'],
            ['label' => 'Inventory Value', 'value' => '$' . number_format($stats['total_value'], 2), 'emoji' => '💰', 'color' => 'from-pink-400 to-rose-500'],
        ] as $card)
            <div class="overflow-hidden rounded-3xl bg-white p-6 shadow-lg shadow-violet-100/80 ring-1 ring-violet-100">
                <div class="mb-4 flex items-center justify-between">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br {{ $card['color'] }} text-xl text-white shadow-md">
                        {{ $card['emoji'] }}
                    </span>
                </div>
                <p class="text-sm font-medium text-slate-500">{{ $card['label'] }}</p>
                <p class="mt-1 text-3xl font-bold text-slate-800">{{ $card['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-8 overflow-hidden rounded-3xl bg-white shadow-lg shadow-violet-100/80 ring-1 ring-violet-100">
        <div class="flex items-center justify-between border-b border-violet-50 px-6 py-4">
            <h2 class="text-lg font-bold text-slate-800">Recent Products</h2>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-violet-600 hover:text-violet-700">View all →</a>
        </div>

        @if ($recentProducts->isEmpty())
            <div class="px-6 py-12 text-center">
                <p class="text-4xl">🌸</p>
                <p class="mt-3 font-semibold text-slate-700">No products yet</p>
                <p class="mt-1 text-sm text-slate-500">Create your first adorable product!</p>
                <a href="{{ route('products.create') }}"
                   class="mt-4 inline-flex rounded-2xl bg-violet-500 px-5 py-2.5 text-sm font-bold text-white hover:bg-violet-600">
                    Add Product
                </a>
            </div>
        @else
            <div class="divide-y divide-violet-50">
                @foreach ($recentProducts as $product)
                    <div class="flex items-center gap-4 px-6 py-4 transition hover:bg-violet-50/50">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-violet-100 to-pink-100 text-2xl">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                            @else
                                🎁
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="truncate font-semibold text-slate-800">{{ $product->name }}</p>
                            <p class="text-sm text-slate-500">{{ $product->category ?? 'Uncategorized' }} · Qty: {{ $product->quantity }}</p>
                        </div>
                        <p class="font-bold text-violet-600">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="rounded-xl bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700 hover:bg-violet-200">View</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
