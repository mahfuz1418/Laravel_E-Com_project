<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function Index()
    {
        return view('admin.allsubcategory');
    }

    public function AddSubategory()
    {
        return view('admin.addsubcategory');
    }
}
