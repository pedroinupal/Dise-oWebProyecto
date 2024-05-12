<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function todas_las_ordenes(){
        return Order::join('customers','customers.id', '=','orders.customer_id')
        ->join('statuses','statuses.id', '=','orders.status_id')
        ->join('products','products.id', '=','orders.product_id')
        ->select('orders.product_id','orders.customer_id','orders.id','customers.username','statuses.status','orders.address','orders.order_date','products.product_name','orders.ordered_quantity','products.available_quantity','orders.PathPhoto1','orders.PathPhoto2')
        ->where('orders.active',true)
        ->orderby('orders.id','asc')
        ->get();
    }

    static function orden_por_id($id){
        return Order::join('customers','customers.id', '=','orders.customer_id')
        ->join('statuses','statuses.id', '=','orders.status_id')
        ->join('products','products.id', '=','orders.product_id')
        ->select('orders.product_id','orders.customer_id','orders.id','customers.username','statuses.status','orders.address','orders.order_date','products.product_name','orders.ordered_quantity','products.available_quantity','orders.PathPhoto1','orders.PathPhoto2')
        ->where('orders.id',$id)
        ->where('orders.active',true)
        ->firstOrFail();
       
    }

    static function ordenes_por_cliente($id){
        return Order::join('customers','customers.id', '=','orders.customer_id')
        ->join('statuses','statuses.id', '=','orders.status_id')
        ->join('products','products.id', '=','orders.product_id')
        ->select('orders.product_id','orders.customer_id','orders.id','customers.username','statuses.status','orders.address','orders.order_date','products.product_name','orders.ordered_quantity','products.available_quantity','orders.PathPhoto1','orders.PathPhoto2')
        ->where('orders.customer_id',$id)
        ->where('orders.active',true)
        ->get();
       
    }

    static function clientes_con_orden(){
        return Order::join('customers','customers.id', '=','orders.customer_id')
        ->select('orders.customer_id', DB::raw('MAX(customers.username) as max_username'))
        ->where('orders.active',true)
        ->groupBy('orders.customer_id')
        ->get();
       
    }
}
