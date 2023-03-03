<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $allproducts = Product::latest()->get();
        return view('home.main', compact('allproducts'));
    }
}
