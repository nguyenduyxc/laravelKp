<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
//        dd('Admin main');
        return view('admin/home', ['title' => 'Admin home']);
    }
}
