@if (session('success'))
    <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700 shadow-sm">
        <span class="text-xl">✅</span>
        <p class="text-sm font-medium">{{ session('success') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-700 shadow-sm">
        <div class="mb-2 flex items-center gap-2 font-semibold">
            <span>⚠️</span>
            Please fix the following:
        </div>
        <ul class="list-inside list-disc space-y-1 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
