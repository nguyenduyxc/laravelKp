<?php

namespace App\Http\Services\Product;

use App\Models\Product;

class ProductServices
{
    const LIMIT = 4;
    public function get($page = null)
    {
        return Product::select('id', 'name', 'thumn', 'price', 'price_sale')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page){
                $offset = $page * self::LIMIT;
                $query->offset($offset);
            })
            ->limit(self::LIMIT)
            ->get();
    }
}
