<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;

class ViewUserController extends Controller
{
   public function AllUser(){

       $user = User::where('role','user')->orderBy('name','ASC')->get();
       return view('backend.user.user_all', compact('user'));

   }

   public function AllAdmin(){

       $admin = User::where('role','admin')->orderBy('name','ASC')->get();
       return view('backend.user.admin_all', compact('admin'));

   }

   public function AddAdmin($id){

       User::findOrFail($id)->update(['role' => 'admin']);

       return redirect()->back();
}
    public function DeleteAdmin($id){

        User::findOrFail($id)->delete();

        $notification = [
            'message' => 'Item Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


}
