<?php

namespace App\Helpers;
use Illuminate\Support\Str;
class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu)
        {
            if($menu->parent_id == $parent_id)
            {
                $html .= '
                        <tr>
                            <td>' .$menu->id.'</td>
                            <td>' .$char . $menu->name.'</td>
                            <td>' . self::active($menu->active).'</td>
                            <td>' .$menu->updated_at.'</td>
                            <td>
                                <a href="/admin/menus/edit/'.$menu->id.'" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <a href="#"  class="btn btn-danger btn-sm"
                                        onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                ';
                unset($menus[$key]); // xoa menu nay di
                $html .= self::menu($menus, $menu->id, $char . '|--' );
            }
        }
        return $html;
    }

    public static function active($active = 1):string
    {
        return $active == 1 ? '<span class="btn btn-sm btn-primary">yes</span>'
            : '<span class="btn btn-sm btn-danger">no</span>';
    }

    public static function menuHeader($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menuHeader($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id):bool
    {
        foreach ($menus as $menu)
        {
            if ($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }

    public static function price($price =0, $price_sale = 0)
    {
//        if ($price !=0) return number_format($price);
//        if ($price_sale !=0) return number_format($price_sale);
        if ($price !=0 ){
            $price = number_format($price);
            $price_sale = number_format($price_sale);
            return '<del>'.$price.'đ</del> - <b>'.$price_sale.'</b>đ';
        }
        return '<a href="/lien-he.html">Lien he</a>';
    }
}
