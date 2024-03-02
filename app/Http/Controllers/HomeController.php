<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->is_admin === 1){
            return view('adminPage');
        }else{
            return view('userPage');
        }
    }
}
