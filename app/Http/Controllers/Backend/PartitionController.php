<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partition;
use App\Models\Category;

class PartitionController extends Controller
{
    public function AllPartition(){

        $partition = Partition::latest()->get();
        return view('backend.partition.partition_all',compact('partition'));

    }
    public function AddPartition(){

        $categories = Category::orderBy('category_name','ASC')->get();
        return view('backend.partition.partition_add',compact('categories'));

    }

    public function StorePartition(Request $request){

        Partition::insert([
            'category_id' => $request->category_id,
            'partition_name' => $request->partition_name,

        ]);

        $notification = [
            'message' => 'Partition Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.partition')->with($notification);

    }
    public function EditPartition($id){

        $partition = Partition::findOrFail($id);
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('backend.partition.partition_edit',compact('partition','categories'));
    }

    public function UpdatePartition(Request $request){

        $partition_id = $request->id;
        Partition::findOrFail($partition_id)->update([
            'category_id' => $request->category_id,
            'partition_name' => $request->partition_name,

        ]);

        $notification = [
            'message' => 'Partition Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.partition')->with($notification);

    }

    public function DeletePartition($id){

        Partition::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Partition Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function GetPartition($category_id){
        $dist = Partition::where('category_id',$category_id)->orderBy('partition_name','ASC')->get();
        return json_encode($dist);

    }
}
