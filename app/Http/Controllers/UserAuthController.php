<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //
    public function userLogin(Request $req)
    {
         $data = $req->input('user');
         $req->session()->put('user',$data);
         return  redirect('profile');
        //  echo session('user');
    }
}
