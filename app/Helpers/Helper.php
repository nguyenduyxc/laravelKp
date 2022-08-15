<?php

namespace App\Helpers;

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
                            <td>' .$menu->active.'</td>
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
}
