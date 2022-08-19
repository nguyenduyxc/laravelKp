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

    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cap nhat slider thanh cong');
        }catch (\Exception $err){
            \Log::info($err->getMessage());
            Session::flash('error', 'Cap nhat slider loi');
            return false;
        }
        return true;
    }
}
