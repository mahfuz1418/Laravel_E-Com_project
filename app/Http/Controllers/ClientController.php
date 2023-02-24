<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage(){
        return view('home.category');
    }

    public function SingleProduct(){
        return view('home.singleproduct');
    }

    public function AddToCart(){
        return view('home.addcart');
    }

    public function Checkout(){
        return view('home.checkout');
    }

    public function UserProfile(){
        return view('home.userprofile');
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
}
