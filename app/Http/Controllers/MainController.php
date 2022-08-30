<?php

namespace App\Http\Controllers;


use App\Http\Services\Product\ProductServices;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderServices;
use App\Http\Services\Menu\MenuService;

class MainController extends Controller
{
    protected  $sliders;
    protected $menus;
    protected $products;
    public function __construct(SliderServices $sliders, MenuService $menus,ProductServices $products)
    {
        $this->sliders = $sliders;
        $this->menus = $menus;
        $this->products = $products;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd( $this->products->get());
//        dd($this->sliders->show());
//        dd($this->menus->show());
        return view('main',
            [
                'title' => 'Shop nuoc hoa',
                'sliders' => $this->sliders->show(),
                'menus' => $this->menus->show(),
                'products' => $this->products->get()
            ]
        );
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->products->get($page);
//        dd($result);
        if(count($result) !== 0 ){
            $html = view('products.list', ['products' => $result] )->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
