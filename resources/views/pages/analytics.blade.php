@extends('layouts.app')

@section('title', 'Analytics')
@section('heading', 'Analytics')

@section('content')
    <div class="rounded-3xl bg-white px-6 py-16 text-center shadow-lg shadow-violet-100/80 ring-1 ring-violet-100">
        <p class="text-5xl">📊</p>
        <h2 class="mt-4 text-xl font-bold text-slate-800">Analytics dashboard</h2>
        <p class="mt-2 text-slate-500">Track sales trends and inventory insights here.</p>
        <a href="{{ route('dashboard') }}" class="mt-6 inline-flex text-sm font-bold text-violet-600 hover:text-violet-700">
            View dashboard stats →
        </a>
    </div>
@endsection
