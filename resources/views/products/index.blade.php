@extends('layouts.app')

@section('title', 'Products')
@section('heading', 'All Products')

@section('header-actions')
    <a href="{{ route('products.create') }}"
       class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-violet-500 to-pink-500 px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-violet-300/50 transition hover:scale-[1.02]">
        <span>➕</span> Add Product
    </a>
@endsection

@section('content')
    @if ($products->isEmpty())
        <div class="rounded-3xl bg-white px-6 py-16 text-center shadow-lg shadow-violet-100/80 ring-1 ring-violet-100">
            <p class="text-5xl">🧸</p>
            <h2 class="mt-4 text-xl font-bold text-slate-800">Your shop is empty</h2>
            <p class="mt-2 text-slate-500">Start by adding your first product.</p>
            <a href="{{ route('products.create') }}"
               class="mt-6 inline-flex rounded-2xl bg-violet-500 px-6 py-3 text-sm font-bold text-white hover:bg-violet-600">
                Create Product
            </a>
        </div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            @foreach ($products as $product)
                <article class="group overflow-hidden rounded-3xl bg-white shadow-lg shadow-violet-100/80 ring-1 ring-violet-100 transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-violet-100 via-pink-100 to-sky-100">
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        @else
                            <div class="flex h-full items-center justify-center text-6xl">🎀</div>
                        @endif
                        <span class="absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-bold {{ $product->is_active ? 'bg-emerald-500 text-white' : 'bg-slate-400 text-white' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <div class="p-5">
                        <div class="mb-2 flex items-start justify-between gap-2">
                            <h3 class="font-bold text-slate-800">{{ $product->name }}</h3>
                            <p class="shrink-0 font-bold text-violet-600">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <p class="line-clamp-2 min-h-[2.5rem] text-sm text-slate-500">{{ $product->description ?: 'No description yet.' }}</p>
                        <div class="mt-4 flex items-center justify-between text-xs font-semibold text-slate-500">
                            <span>{{ $product->category ?? 'Uncategorized' }}</span>
                            <span>Qty: {{ $product->quantity }}</span>
                        </div>

                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('products.show', $product) }}"
                               class="flex-1 rounded-xl bg-violet-100 py-2 text-center text-xs font-bold text-violet-700 hover:bg-violet-200">View</a>
                            <a href="{{ route('products.edit', $product) }}"
                               class="flex-1 rounded-xl bg-amber-100 py-2 text-center text-xs font-bold text-amber-700 hover:bg-amber-200">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="flex-1"
                                  onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full rounded-xl bg-rose-100 py-2 text-xs font-bold text-rose-700 hover:bg-rose-200">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @endif
@endsection
