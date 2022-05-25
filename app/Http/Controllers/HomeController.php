<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chefs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    public function index(){
        $food_items_show = Food::all();
        $all_chefs = Chefs::all();
        return view('home',compact('food_items_show','all_chefs'));
    }

    public function redirects(){
        $food_items_show = Food::all();
        $all_chefs = Chefs::all();

        $user_type = Auth::user()->usertype;

        if($user_type == 1){
            return view('admin.home');
        }else{
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();

            return view('home',compact('food_items_show','all_chefs','count'));
        }
    }

    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function view_cart(Request $request, $id){
        $count = Cart::where('user_id',$id)->count();
        $cart_info = Cart::where('user_id',$id)->join('food','carts.food_id', '=' , 'food.id')->get();
        $cart_number_id = Cart::select('*')->where('user_id', '=', $id)->get();
        return view('view_cart',compact('count','cart_info','cart_number_id'));
    }

    public function remove_cart($id){
        $remove_cart = Cart::find($id);
        $remove_cart->delete();
        return redirect()->back();
    }
}