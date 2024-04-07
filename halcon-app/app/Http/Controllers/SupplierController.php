<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
    
    $suppliers = Supplier::select('id','company_name','address','phone')
    ->orderby('id','asc')
    ->get();
    
    return view('suppliers.index',compact('suppliers'));

    }
}
