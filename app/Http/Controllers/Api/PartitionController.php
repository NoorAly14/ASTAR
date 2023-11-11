<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partition;

class PartitionController extends Controller
{
    public function AllPartition()
    {
        return Partition::latest()->get();
    }

    public function StorePartition(Request $request)
    {

        Partition::insert([
            'category_id' => $request->category_id,
            'partition_name' => $request->partition_name,

        ]);

        return [
            'message' => 'Partition Inserted Successfully',
            'alert-type' => 'success'
        ];
    }

    public function GetPartition($id)
    {

        return Partition::findOrFail($id);
    }

    public function UpdatePartition(Request $request)
    {

        Partition::findOrFail($request->id)->update([
            'category_id' => $request->category_id,
            'partition_name' => $request->partition_name,

        ]);

        return [
            'message' => 'Partition Updated Successfully',
            'alert-type' => 'success'
        ];
    }

    public function DeletePartition($id)
    {
        Partition::findOrFail($id)->delete();

        return [
            'message' => 'Partition Deleted Successfully',
            'alert-type' => 'success'
        ];
    }
}
