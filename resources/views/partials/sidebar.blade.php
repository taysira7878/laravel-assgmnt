<aside class="fixed inset-y-0 left-0 z-30 hidden w-72 flex-col bg-gradient-to-b from-violet-500 via-fuchsia-500 to-pink-500 p-6 text-white shadow-2xl shadow-violet-300/40 lg:flex">
    <div class="mb-10 flex items-center gap-3">
        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/20 text-2xl backdrop-blur-sm">
            🛍️
        </div>
        <div>
            <p class="text-lg font-bold leading-tight">{{ config('app.name') }}</p>
            <p class="text-xs text-white/80">Product Manager</p>
        </div>
    </div>

    <nav class="flex flex-1 flex-col gap-2">
        @php
            $links = [
                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => '🏠', 'patterns' => ['dashboard']],
                ['route' => 'products.index', 'label' => 'All Products', 'icon' => '📦', 'patterns' => ['products.index', 'products.show', 'products.edit']],
                ['route' => 'products.create', 'label' => 'Add Product', 'icon' => '➕', 'patterns' => ['products.create']],
                ['route' => 'categories', 'label' => 'Categories', 'icon' => '🏷️', 'patterns' => ['categories']],
                ['route' => 'analytics', 'label' => 'Analytics', 'icon' => '📊', 'patterns' => ['analytics']],
                ['route' => 'settings', 'label' => 'Settings', 'icon' => '⚙️', 'patterns' => ['settings']],
            ];
        @endphp

        @foreach ($links as $link)
            @php
                $active = collect($link['patterns'])->contains(fn ($pattern) => request()->routeIs($pattern));
            @endphp
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition-all duration-200 {{ $active ? 'bg-white text-violet-600 shadow-lg shadow-violet-900/10' : 'text-white/90 hover:bg-white/15 hover:text-white' }}">
                <span class="text-lg">{{ $link['icon'] }}</span>
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="mt-auto rounded-2xl bg-white/15 p-4 backdrop-blur-sm">
        <p class="text-sm font-semibold">Need help?</p>
        <p class="mt-1 text-xs text-white/80">Manage your cute product catalog with ease.</p>
    </div>
</aside>

<nav class="fixed bottom-0 left-0 right-0 z-30 flex items-center justify-around border-t border-violet-100 bg-white/95 px-2 py-2 backdrop-blur-md lg:hidden">
    @foreach ([
        ['route' => 'dashboard', 'icon' => '🏠', 'label' => 'Home'],
        ['route' => 'products.index', 'icon' => '📦', 'label' => 'Products'],
        ['route' => 'products.create', 'icon' => '➕', 'label' => 'Add'],
        ['route' => 'analytics', 'icon' => '📊', 'label' => 'Stats'],
    ] as $link)
        <a href="{{ route($link['route']) }}"
           class="flex flex-col items-center gap-1 rounded-xl px-3 py-2 text-xs font-semibold {{ request()->routeIs($link['route']) || (isset($link['patterns']) && collect($link['patterns'])->contains(fn ($p) => request()->routeIs($p))) ? 'text-violet-600' : 'text-slate-500' }}">
            <span class="text-lg">{{ $link['icon'] }}</span>
            {{ $link['label'] }}
        </a>
    @endforeach
</nav>
