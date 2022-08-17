<?php

namespace App\Http\Services;

class UploadServices
{
    public function store($request)
    {
        try {
            if($request->hasFile('file')){
                $file = $request->file('file');
                $name = $file->getClientOriginalName();
//            dd($name); // ten file
                $pathFull = 'uploads/' . date('Y/m/d');
                $path = $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
//                dd($path);
                return '/storage/'. $pathFull  .'/'. $name;
            }
        }catch (\Exception $error){
            return false;
        }


    }
}
