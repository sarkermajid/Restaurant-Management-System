<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function users(){
        if(Auth::id() && Auth::user()->usertype == 1){
        $all_user = User::all();
        return view('admin.users', compact('all_user'));
        }else{
            return redirect('login');
        }
    }

    public function user_delete($id){
        $user_delete = User::find($id);
        $user_delete->delete();
        return redirect()->back();
    }

    public function food(){
        if(Auth::id() && Auth::user()->usertype == 1){
        $all_food = Food::all();
        return view('admin.food',compact('all_food'));
        }else{
            return redirect('login');
        }
    }

    public function upload_food(Request $request){
        $food = new food;
        
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;

        // image upload
        $image = $request->image;
        $image_name = time().'.'. $image->getClientOriginalExtension();
        $request->image->move('foodimage',$image_name);
        $food->image = $image_name;

        $food->save();
        return redirect()->back();
    }

    public function food_delete($id){
        $food_delete = Food::find($id);
        $food_delete->delete();
        return redirect()->back();
    }

    public function food_edit($id){
        $food_edit = Food::find($id);
        return view('admin.food_edit',compact('food_edit'));
    }

    public function food_update(Request $request ,$id){
        $food = Food::find($id);

        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;

        // image update
        $image = $request->image;
        if($image){
            $image_name = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('foodimage',$image_name);
            $food->image = $image_name;    
        }
        $food->save();
        return redirect()->back();


    }

    public function reservation(Request $request){
        $reservation = new Reservation;

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;

        $reservation->save();
        return redirect()->back();
    }

    public function view_reservation(){
        if(Auth::id() && Auth::user()->usertype == 1){
        $view_reservation = Reservation::all();
        return view('admin.reservation',compact('view_reservation'));
        }else{
            return redirect('login');
        }
    }

    public function delete_reservation($id){
        $delete_reservation = Reservation::find($id);
        $delete_reservation->delete();
        return redirect()->back();
    }

    public function chefs(){
        if(Auth::id() && Auth::user()->usertype == 1){
        $view_chefs = Chefs::all();
        return view('admin.chefs',compact('view_chefs'));
        }else{
            return redirect('login');
        }
    }

    public function add_chefs(Request $request){
        $add_chefs = new Chefs;
        $add_chefs->name = $request->name;
        $add_chefs->speciality = $request->speciality;

        // image upload
        $image = $request->image;
        $image_name = time().'.'. $image->getClientOriginalExtension();
        $request->image->move('chefsimage',$image_name);
        $add_chefs->image = $image_name;
        
        $add_chefs->save();
        return redirect()->back();
    }

    public function chef_edit($id){
        $chef_edit = Chefs::find($id);
        return view('admin.chef_edit',compact('chef_edit'));
    }

    public function chef_update(Request $request, $id){
        $chef = Chefs::find($id);

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;

        //image update
        $image = $request->image;
        if($image){
            $image_name = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('chefsimage',$image_name);
            $chef->image = $image_name;
        }
        $chef->save();
        return redirect()->back();
    }

    public function chef_delete($id){
        $chef_delete = Chefs::find($id);
        $chef_delete->delete();
        return redirect()->back();
    }

    public function orders(){
        if(Auth::id() && Auth::user()->usertype == 1){
        $customer_orders = Order::all();
        return view('admin.orders',compact('customer_orders'));
        }else{
            return redirect('login');
        }
    }
}