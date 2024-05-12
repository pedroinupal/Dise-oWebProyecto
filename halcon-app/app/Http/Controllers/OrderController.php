<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request)
    {
    
    $user = $request->user();
    $role = $user->role_id;

  

    $orders = Order::todas_las_ordenes();
    
    switch ($request->path()) {
        case 'orders_all':
            if ($role == 4 || $role == 1){
            return view('orders.all', compact('orders'));
            }
            else{
                return  "YOU DONT HAVE THE NECESSARY ROLE TO ACCESS THIS";
            }
            break;
        case 'orders_warehouse':
            if ($role == 4 || $role == 2){
                return view('orders.warehouse', compact('orders'));
            }
            else{
                return  "YOU DONT HAVE THE NECESSARY ROLE TO ACCESS THIS";
            }
            break;
        case 'orders_route':
            if ($role == 4 || $role == 3){
                return view('orders.route', compact('orders'));
            }
            else{
                return  "YOU DONT HAVE THE NECESSARY ROLE TO ACCESS THIS";
            }
            break;
        default:
            abort(404);
        }
    
    } 

    public function create()
    {
        $products = Product::todos_los_productos();
        $customers = Customer::todos_los_clientes();
        return view ('orders.neworder',compact('products','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #dd($request);
        Order::create([
            
            'ordered_quantity' => $request->ordered_quantity, 
            'address' => $request->address,
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'active' => True
        ]);

        return redirect()->route('orders_all.index')
            ->with('success','Orden creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('orders.show') 
        ->with('order',Order::orden_por_id($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('orders.edit')
        ->with('order',Order::orden_por_id($id))
        ->with('products',Product::todos_los_productos())
        ->with('customers',Customer::todos_los_clientes());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $order = Order::orden_por_id($id);

       
        $order->update([
            'ordered_quantity' => $request->ordered_quantity, 
            'address' => $request->address,
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id
        ]);

        return redirect()->route('orders_all.index', $id);
           
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::orden_por_id($id);

        $order->update([
            'active'     =>  false,
        ]);

        return redirect()->route('orders_all.index');
    }

    public function update_status(Request $request, string $id, int $status)
    {
        $order = Order::orden_por_id($id);

        

        $order->update([
            'status_id' => $status
        ]);
        
        if ($status <> 4){
            return redirect()->route('orders_warehouse.index');
        }
        else{
            return redirect()->route('orders_route.index');
        }

    }

    public function update_photo(Request $request, string $id, int $photo)
    {   
        $faker = Faker::create();
        $order = Order::orden_por_id($id);

        switch ($photo) {
            case 1:

            $order->update([
                'PathPhoto1' => $faker->imageUrl(640, 480, 'Loaded Unit Photo', true)
            ]);
            return redirect()->route('orders_warehouse.index');
            break;

            case 2:

                $order->update([
                    'PathPhoto2' => $faker->imageUrl(640, 480, 'Delivery proof', true)
                ]);
                return redirect()->route('orders_route.index');
            break;

        }

       

    }

    public function public_orders(Request $request, string $id)
    {   
        $orders = Order::ordenes_por_cliente($id);
    
        return view('orders.public_orders', compact('orders'));

    }

    public function public_clients(Request $request)
    {   
        $clients= Order::clientes_con_orden();
    
        return view('orders.public_clients', compact('clients'));

    }
}

