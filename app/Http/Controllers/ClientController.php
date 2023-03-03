<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('home.category', compact('category', 'products'));
    }
    public function SubCategoryPage($id){
        $subcategory = Subcategory::findOrFail($id);
        $products = Product::where('product_subcategory_id', $id)->latest()->get();
        return view('home.subcategory', compact('subcategory', 'products'));
    }

    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        $sub_cat = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $sub_cat)->latest()->get();
        return view('home.singleproduct', compact('product', 'related_products'));
    }

    public function AddToCart(){
        $carts = Cart::latest()->get();
        return view('home.addcart', compact('carts'));
    }

    public function AddProductCart(Request $request){
        $quantity = $request->quantity;
        $price = $request->price;
        $total_price = $quantity * $price;
        $request->validate([
            'quantity' => 'required'
        ]);
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $quantity,
            'price' => $total_price
        ]);
        return redirect()->route('addtocart')->with('message', 'Your Cart Added Successfully!');
    }

    public function RemoveCart($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your Cart Rmoved Successfully!');
    }

    public function ShippingAddress(){
       return view('home.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        $request->validate([
            '*' => 'required',
        ]);
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'mobile' => $request->mobile,
            'city' => $request->city,
            'village' => $request->village,
            'postal' => $request->postal
        ]);
        return redirect()->route('checkout');
    }

    public function Checkout(){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();
        return view('home.checkout', compact('cart_items', 'shipping_address' ));
    }

    public function PlaceOrder(){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        foreach ($cart_items as $item) {
            Order::insert([
                'user_id' => Auth::id(),
                'product_id' => $item->product_id,
                'mobile' => $shipping_address->mobile,
                'city' => $shipping_address->city,
                'village' => $shipping_address->village,
                'postal' => $shipping_address->postal,
                'quantity' => $item->quantity,
                'total_price' => $item->price
            ]);
            $id = $item ->id;
            Cart::findOrFail($id)->delete();
        }

        return redirect()->route('pendingorder')->with('message', 'Your order placed successfully!');
    }

    public function UserProfile(){
        $id = Auth::id();
        $user_info = User::where('id', $id)->first();
        return view('home.userprofile' , compact('user_info'));
    }

    public function NewRelease(){
        return view('home.newrelease');
    }

    public function TodayDeal(){
        return view('home.todaydeal');
    }

    public function CustomerService(){
        return view('home.customerservice');
    }

    public function PendingOrders(){
        $user_id = Auth::id();
        $pending_orders = Order::where('status', 'pending')->where('user_id', $user_id)->latest()->get();
        return view('home.pendingorders', compact('pending_orders'));
    }

    public function History(){
        $user_id = Auth::id();
        $confirm_orders = Order::where('status', 'confirmed')->where('user_id', $user_id)->latest()->get();
        return view('home.history', compact('confirm_orders'));
    }
}
