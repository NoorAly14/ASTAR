<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partition;
use App\Models\Category;
use App\Models\Item;

class DataController extends Controller
{
    public function ViewPartition($id)
    {

        $partition = Partition::where('category_id', $id)->orderBy('partition_name', 'ASC')->get();
        return view('frontend.user_partition_view', compact('partition'));
    }

    public function ViewItem($id)
    {

        $item = Item::where('partition_id', $id)->orderBy('item_name', 'ASC')->get();
        return view('frontend.user_item_view', compact('item'));
    }
}
