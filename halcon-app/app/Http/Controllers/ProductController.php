<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
    
    $products = Product::join('suppliers','suppliers.id', '=','products.supplier_id')
    ->select('products.id','product_name','available_quantity','suppliers.company_name')
    ->orderby('products.id','asc')
    ->get();
    
    return view('products.index',compact('products'));

    }
}
