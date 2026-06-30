@php($product = $product ?? new \App\Models\Product(['is_active' => true, 'quantity' => 0]))
    <div class="md:col-span-2">
        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Product Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required
               class="w-full rounded-2xl border border-violet-100 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-violet-300 focus:ring-4 focus:ring-violet-100"
               placeholder="Cute plush bunny...">
    </div>

    <div class="md:col-span-2">
        <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
        <textarea name="description" id="description" rows="4"
                  class="w-full rounded-2xl border border-violet-100 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-violet-300 focus:ring-4 focus:ring-violet-100"
                  placeholder="Tell customers why this product is adorable...">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="price" class="mb-2 block text-sm font-semibold text-slate-700">Price ($)</label>
        <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $product->price ?? '') }}" required
               class="w-full rounded-2xl border border-violet-100 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-violet-300 focus:ring-4 focus:ring-violet-100"
               placeholder="19.99">
    </div>

    <div>
        <label for="quantity" class="mb-2 block text-sm font-semibold text-slate-700">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="0" value="{{ old('quantity', $product->quantity ?? 0) }}" required
               class="w-full rounded-2xl border border-violet-100 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-violet-300 focus:ring-4 focus:ring-violet-100"
               placeholder="100">
    </div>

    <div>
        <label for="category" class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
        <input type="text" name="category" id="category" value="{{ old('category', $product->category ?? '') }}"
               class="w-full rounded-2xl border border-violet-100 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition focus:border-violet-300 focus:ring-4 focus:ring-violet-100"
               placeholder="Toys, Gifts, Accessories...">
    </div>

    <div>
        <label for="image" class="mb-2 block text-sm font-semibold text-slate-700">Product Image</label>
        <input type="file" name="image" id="image" accept="image/*"
               class="w-full rounded-2xl border border-dashed border-violet-200 bg-violet-50/50 px-4 py-3 text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-violet-500 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-violet-600">
        @if (!empty($product?->image))
            <p class="mt-2 text-xs text-slate-500">Current image will be replaced if you upload a new one.</p>
        @endif
    </div>

    <div class="md:col-span-2">
        <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-violet-100 bg-violet-50/50 px-4 py-3">
            <input type="checkbox" name="is_active" value="1"
                   @checked(old('is_active', $product->is_active ?? true))
                   class="h-5 w-5 rounded-lg border-violet-300 text-violet-500 focus:ring-violet-300">
            <span class="text-sm font-semibold text-slate-700">Product is active and visible</span>
        </label>
    </div>
</div>
