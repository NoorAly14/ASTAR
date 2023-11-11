<?php

namespace App\services;

use Illuminate\Support\Facades\Auth;

class  AdminService
{

    public function AdminDestroy($data)
    {

        Auth::guard('web')->logout();

        $data->session()->invalidate();

        $data->session()->regenerateToken();
    }


    public function AdminProfileStore($data)
    {
        $user = (object) Auth::user();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->phone = $data->phone;
        $user->address = $data->address;

        if ($data->file('photo')) {
            $file = $data->file('photo');
            @unlink(public_path('upload/admin_images/' . $user->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $user->photo = $filename;
        }

        $user->save();
    }
}
