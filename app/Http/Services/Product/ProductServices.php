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

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')  // goi den function menu ben model
            ->firstOrFail();
    }

    public function productRelated($id)
    {
        return Product::select('id', 'name', 'thumn', 'price', 'price_sale')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
