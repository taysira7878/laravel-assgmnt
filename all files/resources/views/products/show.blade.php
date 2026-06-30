@extends('layouts.app')

@section('title', $product->name)
@section('heading', $product->name)

@section('header-actions')
    <div class="flex gap-2">
        <a href="{{ route('products.edit', $product) }}"
           class="inline-flex items-center gap-2 rounded-2xl bg-amber-100 px-4 py-2.5 text-sm font-bold text-amber-700 hover:bg-amber-200">
            ✏️ Edit
        </a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center gap-2 rounded-2xl bg-rose-100 px-4 py-2.5 text-sm font-bold text-rose-700 hover:bg-rose-200">
                🗑️ Delete
            </button>
        </form>
    </div>
@endsection

@section('content')
    <div class="grid gap-6 lg:grid-cols-2">
        <div class="overflow-hidden rounded-3xl bg-white shadow-lg shadow-violet-100/80 ring-1 ring-violet-100">
            <div class="aspect-square bg-gradient-to-br from-violet-100 via-pink-100 to-sky-100">
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-8xl">🎁</div>
                @endif
            </div>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-lg shadow-violet-100/80 ring-1 ring-violet-100 sm:p-8">
            <div class="mb-6 flex flex-wrap gap-2">
                <span class="rounded-full bg-violet-100 px-3 py-1 text-xs font-bold text-violet-700">
                    {{ $product->category ?? 'Uncategorized' }}
                </span>
                <span class="rounded-full px-3 py-1 text-xs font-bold {{ $product->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-600' }}">
                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <p class="text-4xl font-bold text-violet-600">${{ number_format($product->price, 2) }}</p>
            <p class="mt-2 text-sm font-semibold text-slate-500">Stock: {{ $product->quantity }} units</p>

            <div class="mt-6">
                <h3 class="text-sm font-bold uppercase tracking-wide text-slate-400">Description</h3>
                <p class="mt-2 leading-relaxed text-slate-600">
                    {{ $product->description ?: 'No description provided for this product.' }}
                </p>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-4">
                <div class="rounded-2xl bg-violet-50 p-4">
                    <p class="text-xs font-semibold text-violet-500">Created</p>
                    <p class="mt-1 text-sm font-bold text-slate-700">{{ $product->created_at->format('M d, Y') }}</p>
                </div>
                <div class="rounded-2xl bg-pink-50 p-4">
                    <p class="text-xs font-semibold text-pink-500">Updated</p>
                    <p class="mt-1 text-sm font-bold text-slate-700">{{ $product->updated_at->format('M d, Y') }}</p>
                </div>
            </div>

            <a href="{{ route('products.index') }}"
               class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-violet-600 hover:text-violet-700">
                ← Back to products
            </a>
        </div>
    </div>
@endsection
