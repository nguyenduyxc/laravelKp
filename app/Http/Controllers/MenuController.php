<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request, $id, $slug='')
    {
        $menu = $this->menuService->getMenuId($id);
        $products = $this->menuService->getProductByMenu($menu, $request);
//        dd($products);
        return view('menu', [
            'title' => $menu->name,
            'menu' => $menu,
            'products' => $products,
        ]);
    }
}
