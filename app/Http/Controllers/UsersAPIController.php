<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\pharmaceutical_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersAPIController extends Controller
{
    // public function list(){
    //     $users = Users::where('userID','!=',"0")->get();
    //     return view('admin.list')->with('user', $users);
    // }
    // public function itemList(){
    //     $items = Pharmaceutical_items::where('userID','!=',"0")->get();
    //     return view('pharmacist.list')->with('items', $items);
    // }
    
    // public function addUser(){
    //     return view('pharmacist.addItem');
    // }
    // public function addUserSubmit(Request $request){
    //     $validate = $request->validate([
    //         'name' => 'required| min:3',
    //         'email' => 'required',
    //         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
    //         'password' => 'required|min:6|confirmed',
    //         'password_confirmation' => 'required|min:6|same:password',
    //         'dob' => 'required',
    //         'gender' => 'required',
    //         'role' => 'required'
    //     ],
    //     ['name.required'=>"Please put you name here",
    //     'name.min'=>"Name must be at least 3 characters long"],
    // );
    //     $user = new Users();
    
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phoneNumber = $request->phone;
    //     $user->password = md5($request->password);
    //     $user->dob = $request->dob;
    //     $user->gender = $request->gender;
    //     $user->role = $request->role;
    //     $user->save();
    
    //     return redirect()->route('listPharmascist');
    // }
    public function APIlist(){
        $users = Users::where('userID','!=',"0")->get();
        return  $users;
    }
    public function APIpost(Request $request){
        
        $user = new Users();
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();
    
        return $request;
    }
    public function APIItemlist(){
        $items = Pharmaceutical_items::all();
        return  $items;
    }
    public function APIItempost(Request $request){
        
        $item = new Pharmaceutical_items();
        $item->itemName = $request->itemName;
        $item->price = $request->price;
        $item->save();
    
        return $request;
    }
    public function createItemSubmit(Request $request)
    {
        $item = new Pharmaceutical_items();
        $item->itemName = $request->itemName;
        $item->userID = $request->userID;
        $item->price = $request->price;
        $item->save();
        return "Item added successfully";
    }

}