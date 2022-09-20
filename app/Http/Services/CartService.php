<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {

        $qty = (int) $request->input('num-product');
        $product_id = (int) $request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }
//        Session::forget('carts');
        $carts = Session::get('carts');

//        dd($carts);

        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);

        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }


        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;

    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $productId = array_keys($carts);

//        dd($productId);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumn')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
//        dd($carts, $productId);
    }

    public function update($request)
    {
        $carts = Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function delete($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if (is_null($carts)) return false;
            $customer = Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'content' => $request->content,
            ]);
            $this->infoProductCarts($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'dat hang thanh cong');

            Session::forget('carts');
        }catch (\Exception $error)
        {
            DB::rollBack();
            Session::flash('error', 'Dat hang loi');
            return $error->getMessage();
        }

        return true;
    }

    public function infoProductCarts($carts, $customer_id)
    {

        $productId = array_keys($carts);

        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumn')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $key => $product)
        {
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $pty = $carts[$product->id];
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty' => $pty,
                'price' => $price ,
            ];
        }

        return Cart::insert($data);
    }
}
