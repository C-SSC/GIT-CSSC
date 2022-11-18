<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cuscontroller extends Controller
{
    public function dangky(Request $request){
        
    }
    public function dangNhap(Request $request){
        $data= $request->only('email','password');
        $check = Auth::guard('customer')->Auth::attempt([$data]);
        if ($check){
            return redirect('/chat');
        }else{
            return redirect('/');
        }
    }
}
