<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }

    public function AddProduct()
    {
        $categories =Category::latest()->get();
        return view('admin.addproduct', compact('categories'));
    }
    public function StoreProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products,product_name',
            'price' => 'required',
            'product_quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|mimes:png,jpg|max:4096',
        ]);
        
        //Image upload to path
        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $image_name);
        $img_url = 'upload/' . $image_name;

        //Category and subcategory name
        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ','_', $request->subcategory_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $img_url
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);
        return redirect()->route('allproducts')->with('message', 'Product Added Successfully!');
    }
    public function EditProduct($id)
    {
        $categories =Category::latest()->get();
        return view('admin.editproduct', compact('categories'));
    }
    public function UpdateProduct(Request $request)
    {
        
    }
    
}
