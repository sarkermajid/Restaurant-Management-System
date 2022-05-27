<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chefs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){

            return redirect('redirects');
        }else{
            $food_items_show = Food::all();
            $all_chefs = Chefs::all();
            return view('home',compact('food_items_show','all_chefs'));
        }
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
        if(Auth::id() == $id){
        $count = Cart::where('user_id',$id)->count();
        $cart_info = Cart::where('user_id',$id)->join('food','carts.food_id', '=' , 'food.id')->get();
        $cart_number_id = Cart::select('*')->where('user_id', '=', $id)->get();
        return view('view_cart',compact('count','cart_info','cart_number_id'));
        }else{
            return redirect()->back();
        }
    }

    public function remove_cart($id){
        $remove_cart = Cart::find($id);
        $remove_cart->delete();
        return redirect()->back();
    }

    public function order_confirm(Request $request){
        foreach($request->foodname as $key => $foodname)
        
        {
            $order_confirm = new Order;
            $order_confirm->foodname = $foodname;
            $order_confirm->price = $request->price[$key];
            $order_confirm->quantity = $request->quantity[$key];
            $order_confirm->name = $request->name;
            $order_confirm->phone = $request->phone;
            $order_confirm->address = $request->address;

            $order_confirm->save();
        }
        return redirect()->back();
    }
}