@extends('layouts.app')

@section('title', 'Add Product')
@section('heading', 'Add New Product')

@section('content')
    <div class="mx-auto max-w-3xl rounded-3xl bg-white p-6 shadow-lg shadow-violet-100/80 ring-1 ring-violet-100 sm:p-8">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('products._form')

            <div class="flex flex-wrap gap-3 pt-2">
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-violet-500 to-pink-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-violet-300/50 hover:scale-[1.02]">
                    <span>💾</span> Save Product
                </button>
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center rounded-2xl bg-slate-100 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
