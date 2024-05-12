<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    static function todos_los_clientes(){
        return Customer::select('customers.id','name','username','rfc')
        ->where('customers.active',true)
        ->orderby('customers.id','asc')
        ->get();
    }

    static function cliente_por_id($id){
        return Customer::select('customers.id','name','username','rfc')
        ->where('customers.active',true)
        ->where('customers.id',$id)
        ->firstOrFail();
       
    }
}
