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
    public function EditProductImg($id){
        $products = Product::findOrFail($id);
        return view('admin.editproductimg', compact('products'));
    }
    public function UpdateProductImg(Request $request){
        $id = $request->id;   
        $request->validate([
            'product_img' => 'required|mimes:png,jpg|max:4096',
        ]);
        //Image upload to path
        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $image_name);
        $img_url = 'upload/' . $image_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url
        ]);
        return redirect()->route('allproducts')->with('message', 'Product Image Updated Successfully!');
    }
    public function EditProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editproduct', compact('product'));
    }
    public function UpdateProduct(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'product_name' => 'required|unique:products,product_name',
            'price' => 'required',
            'product_quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required'
        ]);
        

        Product::findOrFail($id)->update([
            // 'product_name' => $request->product_name,
            // 'slug' => strtolower(str_replace(' ','_', $request->subcategory_name)),
            // 'product_short_des' => $request->product_short_des,
            // 'product_long_des' => $request->product_long_des,
            // 'price' => $request->price,
            'product_quantity' => $request->product_quantity,
        ]);
        return redirect()->route('allproducts')->with('message', 'Product Information updated Successfully!');
    }
    public function DeleteProduct($id){
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcat_id)->decrement('product_count', 1);
        return redirect()->route('allproducts')->with('message', 'Product Deleted Successfully!');
    }
    
}
