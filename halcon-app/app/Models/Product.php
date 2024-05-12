<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    static function todos_los_productos(){
        return Product::join('suppliers','suppliers.id', '=','products.supplier_id')
        ->select('products.supplier_id','products.id','product_name','available_quantity','suppliers.company_name')
        ->where('products.active',true)
        ->orderby('products.id','asc')
        ->get();
    }

    static function producto_por_id($id){
        return Product::join('suppliers','suppliers.id', '=','products.supplier_id')
        ->select('products.supplier_id','products.id','product_name','available_quantity','suppliers.company_name')
        ->where('products.id',$id)
        ->where('products.active',true)
        ->firstOrFail();
       
    }
}
