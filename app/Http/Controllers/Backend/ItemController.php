<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Partition;

class ItemController extends Controller
{
    public function AllItem()
    {

        $items = Item::latest()->get();

        return view('backend.item.item_all', compact('items'));
    }

    public function AddItem()
    {

        $categories = Category::orderBy('category_name', 'ASC')->get();
        $partition =  Partition::orderBy('partition_name', 'ASC')->get();
        return view('backend.item.item_add', compact('categories', 'partition'));
    }

    public function StoreItem(Request $request)
    {

        Item::insert([
            'category_id' => $request->category_id,
            'partition_id' => $request->partition_id,
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,

        ]);

        $notification = [
            'message' => 'Item Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.item')->with($notification);
    }
    public function EditItem($id)
    {

        $item = Item::findOrFail($id);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $partition = Partition::orderBy('partition_name', 'ASC')->get();
        return view('backend.item.item_edit', compact('categories', 'partition', 'item'));
    }

    public function UpdateItem(Request $request)
    {

        Item::findOrFail($request->id)->update([
            'category_id' => $request->category_id,
            'partition_id' => $request->partition_id,
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,

        ]);

        $notification = [
            'message' => 'Item Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.item')->with($notification);
    }

    public function DeletePItem($id)
    {

        Item::findOrFail($id)->delete();

        $notification = [
            'message' => 'Item Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
