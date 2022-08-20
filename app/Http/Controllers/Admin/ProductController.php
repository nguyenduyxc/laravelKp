<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $productAdminServices;
    public function __construct(ProductAdminService $productAdminServices)
    {
        $this->productAdminServices = $productAdminServices;
    }

    public function index()
    {
//        dd($this->productAdminServices->getProducts()[0]->id);
        return view('admin.product.list', [
            'title' => 'Danh sach san pham ',
            'products'=>$this->productAdminServices->getProducts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd($this->productAdminServices->getMenu());
        return view('admin.product.create', [
            'title' => 'Them san pham',
            'menus' => $this->productAdminServices->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
//        dd($request->except(['_token']));
            $this->productAdminServices->insert($request);
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        dd('Sua  san pham '. $product->name);
        return view('admin.product.edit',[
            'title' => 'Sua  san pham'. $product->name,
            'menus' => $this->productAdminServices->getMenu(),
            'product' => $product
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
//        dd($request->all());
        $result = $this->productAdminServices->update($request, $product);
//        dd($result);
        if ($result){
//            dd($result);
            return redirect('/admin/products/list');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->productAdminServices->destroy($request);
//        dd($result);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoa thanh cong san pham hehe'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
