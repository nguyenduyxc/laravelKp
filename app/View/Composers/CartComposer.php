<?php

namespace App\View\Composers;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $producId = array_keys($carts);
        $productCart = Product::select('id', 'name', 'price', 'price_sale', 'thumn')
            ->where('active', 1)
            ->whereIn('id', $producId)
            ->get();
        $view->with( 'productCarts', $productCart);
    }
}
