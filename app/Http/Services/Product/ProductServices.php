<?php

namespace App\Http\Services\Product;

use App\Models\Product;

class ProductServices
{
    const LIMIT = 16;
    public function get()
    {
        return Product::select('id', 'name', 'thumn', 'price', 'price_sale')->orderByDesc('id')
            ->limit(self::LIMIT)->get();
    }
}
