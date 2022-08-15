<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateCategoryRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create(){
//        dd($this->menuService->getParent()[0]->description);
        return view('admin.menu.add', [
            'title' => 'Them danh muc',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateCategoryRequest $request){
//        dd($request->input());
        $request->validated();
        $result = $this->menuService->create($request);
        return redirect()->back();
    }

    public function index(){
//        dd($this->menuService->getAll());
//        $menus = Menu::all();
        return view('admin.menu.list', [
            'title' => 'Danh sach danh muc moi nhat',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

}
