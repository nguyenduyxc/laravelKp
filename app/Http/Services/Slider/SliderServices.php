<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $slider = Slider::where('id', $id)->first();
        if ($slider){
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }
}
