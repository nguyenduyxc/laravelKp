<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
//        dd(Session::get('carts'));
        if($result === false)
        {
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

//        dd($products);
        return view('carts.list', [
            'title' => 'gio hang',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
//        dd($request->all());

        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function delete($id)
    {
        $this->cartService->delete($id);
        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        $this->cartService->addCart($request);
        return redirect('/carts');
    }
}
