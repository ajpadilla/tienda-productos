<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Store\Product\Product;

class ProductController extends Controller
{
   
   public function index()
   {
   		return view('products.index');
   }

}
