<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function AllCategory()
    {

        return Category::latest()->get();
    }

    public function StoreCategory(Request $request)
    {
        Category::insert([
            'category_name' => $request->category_name,

        ]);

        return [
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        ];
    }
    public function GetCategory($id)
    {
        return Category::findOrFail($id);
    }

    public function UpdateCategory(Request $request)
    {

        Category::findOrFail($request->id)->update([
            'category_name' => $request->category_name,
        ]);

        return [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ];
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return [
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        ];
    }
}
