@extends('layouts.app')

@section('title', 'Settings')
@section('heading', 'Settings')

@section('content')
    <div class="mx-auto max-w-2xl rounded-3xl bg-white p-6 shadow-lg shadow-violet-100/80 ring-1 ring-violet-100 sm:p-8">
        <p class="text-4xl">⚙️</p>
        <h2 class="mt-4 text-xl font-bold text-slate-800">Shop settings</h2>
        <p class="mt-2 text-slate-500">Configure your store preferences and appearance.</p>

        <div class="mt-8 space-y-4">
            <div class="rounded-2xl border border-violet-100 bg-violet-50/50 p-4">
                <p class="text-sm font-semibold text-slate-700">App Name</p>
                <p class="mt-1 text-slate-500">{{ config('app.name') }}</p>
            </div>
            <div class="rounded-2xl border border-violet-100 bg-violet-50/50 p-4">
                <p class="text-sm font-semibold text-slate-700">Database</p>
                <p class="mt-1 text-slate-500">MySQL — {{ config('database.connections.mysql.database') }}</p>
            </div>
        </div>
    </div>
@endsection
