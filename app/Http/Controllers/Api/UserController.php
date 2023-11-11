<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public  function  AllUser(){

        return User::where('role','user')->orderBy('name','ASC')->get();

    }

    public function AllAdmin(){

        return   User::where('role','admin')->orderBy('name','ASC')->get();
    }

    public function AddAdmin($id){

       return User::findOrFail($id)->update(['role' => 'admin']);
    }

    public function DeleteUser($id){

       return User::findOrFail($id)->delete();

    }
}
