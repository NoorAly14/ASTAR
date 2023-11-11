<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function AllCategory()
    {

        $category = Category::latest()->get();

        return view('backend.category.category_all', compact('category'));
    }

    public function AddCategory()
    {

        return view('backend.category.category_add');
    }

    public function StoreCategory(Request $request)
    {

        Category::insert([
            'category_name' => $request->category_name,

        ]);

        $notification = [
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }
    public function EditCategory($id)
    {

        $category = Category::findOrFail($id);

        return view('backend.category.category_edit', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {

        Category::findOrFail($request->id)->update([
            'category_name' => $request->category_name,

        ]);

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {

        Category::findOrFail($id)->delete();

        $notification = [
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
