<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
    
    $customers = Customer::select('customers.id','name','username','rfc')
    ->orderby('customers.id','asc')
    ->get();
    
    return view('customers.index',compact('customers'));

    }
}
