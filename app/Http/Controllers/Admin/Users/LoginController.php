<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin/users/login', ['title' => 'Dang nhap he thong']);
    }

    public function store(Request $request){
//        dd($request->input());
        $validated = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))){
            $request->session()->flash('thongbaodangnhap', 'Ban da dang nhap thanh cong');
            return redirect()->route('admin.home');
        }
        Session::flash('thongbaodangnhap', 'Email hoac mat khau ko dung');
        return redirect()->back();

    }

}
