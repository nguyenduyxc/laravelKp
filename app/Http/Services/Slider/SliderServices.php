<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class SliderServices
{
    public function insert($request)
    {
        try {
            Slider::create($request->all());
            Session::flash('success', 'Them moi slider thanh cong');
        }catch (\Exception $error){
            \Log::info($error->getMessage());
            Session::flash('error', 'Them moi slider loi');
            return false;
        }
        return true;
    }

    public function get()
    {
        return Slider::orderBy('id', 'desc')->paginate(15);
    }
}
