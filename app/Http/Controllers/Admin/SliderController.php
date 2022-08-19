<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\CreateSliderRequest;
use App\Http\Services\Slider\SliderServices;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(SliderServices $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd($this->sliderService->get());
        return view('admin.slider.list', [
            'title'=>'Danh sach slider moi nhat',
            'sliders' => $this->sliderService->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add', [
            'title' => 'Them slider',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request)
    {
//        dd($request->all());
        $this->sliderService->insert($request);
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
    public function edit(Slider $slider)
    {
//        dd('Cap nhat slider '. $slider->name);
        return view('admin.slider.edit', [
            'title' => 'Cap nhat slider '. $slider->name,
            'slider' => $slider
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSliderRequest $request, Slider $slider)
    {
//        dd($slider);
//        dd($request->input());
         $result = $this->sliderService->update($request, $slider);
         if($result)
         {
             return redirect('/admin/sliders/list');
         }
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->sliderService->destroy($request);
        if ($result)
        {
            dd('duy');
            return response()->json([
                'error' => false,
                'message' => 'Xoa slider thanh cong'
            ]);
            return response()->json([
                'error' => true
            ]);
        }
    }
}
