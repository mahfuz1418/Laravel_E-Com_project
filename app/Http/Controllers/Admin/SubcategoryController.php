<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function Index()
    {
        $subcategories = Subcategory::latest()->get();
        return view('admin.allsubcategory' , compact('subcategories') );
    }

    public function AddSubategory()
    {
        $category_info = Category::latest()->get();
        return view('admin.addsubcategory', compact('category_info'));
    }
    public function StoreSubategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories,subcategory_name',
            'category_id' => 'required'
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','_', $request->subcategory_name)),
            'category_name' => $category_name,
            'category_id' => $category_id
        ]);
        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Added Successfully');
    }
    public function EditSubcategory($id)
    {
        $subcategory_info = Subcategory::findOrFail($id);
        return view('admin.editsubcategory', compact('subcategory_info'));
    }
    public function UpdateSubcategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories,subcategory_name',
        ]);

        $sub_id = $request->subcat_id;

        Subcategory::findOrFail($sub_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','_', $request->subcategory_name)),
        ]);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Updated Successfully');
    }
    public function DeleteSubcategory($id)
    {
        $cat_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Deleted Successfully!');
    }
}
