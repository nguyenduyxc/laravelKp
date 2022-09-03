<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }
    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $title = $product->name;
        $productRelateds = $this->productService->productRelated($id);
        return view('products.content', [
            'product' => $product,
            'title' => $title,
            'products' => $productRelateds
        ]);
    }
}
