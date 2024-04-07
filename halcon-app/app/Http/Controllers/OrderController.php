<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Product;

class OrderController extends Controller
{
    
    public function showOrders(Request $request)
    {
    
    $orders = Order::join('customers','customers.id', '=','orders.customer_id')
    ->join('statuses','statuses.id', '=','orders.status_id')
    ->join('products','products.id', '=','orders.product_id')
    ->select('orders.id','customers.username','statuses.status','orders.address','orders.order_date','products.product_name','orders.ordered_quantity','products.available_quantity','orders.PathPhoto1','orders.PathPhoto2')
    ->orderby('orders.id','asc')
    ->get();
    
    switch ($request->path()) {
        case 'orders_all':
            return view('orders.all', compact('orders'));
            break;
        case 'orders_warehouse':
            return view('orders.warehouse', compact('orders'));
            break;
        case 'orders_route':
            return view('orders.route', compact('orders'));
            break;
        default:
            abort(404);
        }
    }
}
