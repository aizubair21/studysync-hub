<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\vendor\vendorStoreRequest;
use Illuminate\Http\Request;

class adminController extends Controller
{

    
    //vendor/user index
    public function vendorIndex()
    {
        return view("admin.vendor.index");
    }

    //create form form creatind vendor
    public function vendorCreate()
    {
        return view("admin.vendor.create");
    }
    
}
