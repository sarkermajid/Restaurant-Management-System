<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        $all_user = User::all();
        return view('admin.users', compact('all_user'));
    }

    public function user_delete($id){
        $user_delete = User::find($id);
        $user_delete->delete();
        return redirect()->back();
    }

    public function food(){
        $all_food = Food::all();
        return view('admin.food',compact('all_food'));
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

        // image upload
        $image = $request->image;
        $image_name = time().'.'. $image->getClientOriginalExtension();
        $request->image->move('foodimage',$image_name);
        $food->image = $image_name;

        $food->save();
        return redirect()->back();


    }

}
