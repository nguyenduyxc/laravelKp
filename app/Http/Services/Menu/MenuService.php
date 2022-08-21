<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function show()
    {
        return Menu::select('id', 'name')->where('parent_id', 0)->orderbyDesc('id')->get();
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(10);
    }

    public function create($request){
        try {
//            dd($request->input());
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'slug' => Str::slug($request->input('name'), '-'),
                'active' => (string) $request->input('active'),

            ]);
        Session::flash('addCategorySuccess', 'Tao thanh cong');
        }catch (\Exception $err){
            Session::flash('err', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function update($request, $menu)
    {
            if ($menu->id != $request->input('parent_id') ){
                $menu->parent_id =(int)$request->input('parent_id');
            }
            $menu->name =(string)$request->input('name');
            $menu->description = (string)$request->input('description');
            $menu->content = (string)$request->input('content');
            $menu->active = (string)$request->input('active');

            $menu->save();
            Session::flash('success', 'Cap nhat thanh cong');
            return true;
    }
}
