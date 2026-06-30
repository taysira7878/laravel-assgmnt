<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Cloud Plush Bunny',
                'description' => 'Ultra-soft bunny plush with pastel pink ears. Perfect for cozy nights.',
                'price' => 24.99,
                'quantity' => 45,
                'category' => 'Plush Toys',
                'is_active' => true,
            ],
            [
                'name' => 'Starlight Night Lamp',
                'description' => 'Cute moon-shaped lamp that glows in warm amber light.',
                'price' => 32.50,
                'quantity' => 18,
                'category' => 'Home Decor',
                'is_active' => true,
            ],
            [
                'name' => 'Berry Bliss Candle',
                'description' => 'Hand-poured candle with sweet strawberry and vanilla scent.',
                'price' => 15.00,
                'quantity' => 8,
                'category' => 'Candles',
                'is_active' => true,
            ],
            [
                'name' => 'Kawaii Stationery Set',
                'description' => 'Pastel pens, sticky notes, and washi tape in a gift box.',
                'price' => 19.99,
                'quantity' => 30,
                'category' => 'Stationery',
                'is_active' => true,
            ],
            [
                'name' => 'Mini Succulent Pot',
                'description' => 'Adorable ceramic pot with a tiny live succulent inside.',
                'price' => 12.75,
                'quantity' => 5,
                'category' => 'Plants',
                'is_active' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
