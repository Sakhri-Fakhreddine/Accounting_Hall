<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $fullname = Auth::user()->name;
        if ($usertype == '0') {
            return view('admin.home',compact('fullname'));
        } else if($usertype=='1') {
            return view('accountant.home',compact('fullname'));
        }
        else {
            return view('client.home',compact('fullname'));
        }
    }

    public function index ()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else 
        {
        return view('accountant.home');
        }
    }
}
