<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploadServices;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $upload;
    public function __construct(UploadServices $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request){
//        dd($request->file());
        $url = $this->upload->store($request);
//        dd($url);
        if($url != false){
            return response()->json([
                'error' => false,
                'url' =>$url
            ]);
        }

        return response()->json([ 'error' => true]);
    }

}
