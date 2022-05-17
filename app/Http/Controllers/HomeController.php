<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;

class HomeController extends Controller
{
    public function index(){
        $food_items_show = Food::all();
        return view('home',compact('food_items_show'));
    }

    public function redirects(){

        $food_items_show = Food::all();
        $user_type = Auth::user()->usertype;

        if($user_type == 1){
            return view('admin.home');
        }else{
            return view('home',compact('food_items_show'));
        }
    }
}