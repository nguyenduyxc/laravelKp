<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{

    public function getMenu(){
        return Menu::where('active', 1)->get();
    }

    public function getProducts()
    {
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }

    public function isValidPrice($request)
    {
        if(($request->input('price') !=0 && $request->input('price_sale') !=0)
            && ($request->input('price') <= $request->input('price_sale')))
        {
            Session::flash('error', 'Gia niem yet phai lon hon gia khuyen mai');
            return false;
        }

        if ($request->input('price') == 0 && $request->input('price_sale') !=0)
        {
            Session::flash('error', 'Vui long nhap gia goc');
            return false;
        }
        return true;
    }

    public function insert($request)
    {
        $isValidPrice =  $this->isValidPrice($request);
        if( $isValidPrice === false) return false;
//        dd('test ty thoi');
        try {
            $request->except(['_token']);
            Product::create($request->all());
            Session::flash('success', 'Them san pham thanh cong');
        }catch (\Exception $err){
            Session::flash('error', 'Them san pham loi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}
