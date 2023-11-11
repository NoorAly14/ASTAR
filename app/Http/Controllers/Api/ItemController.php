<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function AllItem()
    {
        return Item::latest()->get();
    }

    public function StoreItem(Request $request)
    {

        Item::insert([
            'category_id' => $request->category_id,
            'partition_id' => $request->partition_id,
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,

        ]);

        return [
            'message' => 'Item Inserted Successfully',
            'alert-type' => 'success'
        ];
    }

    public function GetItem($id)
    {
        return Item::findOrFail($id);
    }

    public function UpdateItem(Request $request)
    {
        Item::findOrFail($request->id)->update([
            'category_id' => $request->category_id,
            'partition_id' => $request->partition_id,
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,

        ]);

        return [
            'message' => 'Item Updated Successfully',
            'alert-type' => 'success'
        ];
    }

    public function DeletePItem($id)
    {
        Item::findOrFail($id)->delete();

        return [
            'message' => 'Item Deleted Successfully',
            'alert-type' => 'success'
        ];
    }
}
