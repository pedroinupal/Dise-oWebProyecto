<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Role;

class WorkerController extends Controller
{
    public function index()
    {
    
    $workers = Worker::join('roles','roles.id', '=','workers.role_id')
    ->select('workers.id','name','username','roles.role')
    ->orderby('workers.id','asc')
    ->get();
    
    return view('workers.index',compact('workers'));

    }
}
