<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\services\AdminService;

class AdminController extends Controller
{

    public  function __construct(
        private readonly AdminService $adminService
    ) {
    }

    public function  AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function AdminDestroy(Request $request)
    {

        $this->adminService->AdminDestroy($request);

        return redirect('/login');
    }

    public function AdminProfile()
    {

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileStore(Request $request)
    {

        $this->adminService->AdminProfileStore($request);
        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
