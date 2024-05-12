<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders (Warehouse)</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #DADADB; /* Gris claro */
        }
        
        .table td, .table th {
            vertical-align: middle; /* Alinea verticalmente */
            text-align: center; /* Alinea horizontalmente */
            
        }
        .table thead th {
            vertical-align: middle; /* Alinea verticalmente los headers */
            text-align: center; /* Alinea horizontalmente los headers */
        }
        .table img {
            max-width: 200px; /* Limita el ancho de las imagenes */
            height: auto; /* Mantiene la relacion de aspecto */
        }

        button {
            display: block;
            width: 100%; /* Ajusta el ancho de los botones */
            margin-bottom: 10px; /* Ajusta la separación vertical entre los botones */
            padding: 10px; /* Ajusta el relleno de los botones */
            box-sizing: border-box; /* Incluye el relleno y el borde en el ancho total */
        }

       
        .container > .edge-to-edge {
            margin-left:-150px; // Offset for when nested in a .container
            margin-right:-150px; // Offset for when nested in a .container
        }

      
    </style>
    
</head>
<header>
    @include('components.nav-bar')
</header>
<body>
   <div class="container">
   <section class="edge-to-edge">
        <div class="row">
            <div class="col-12">
                <h1 class="bg-primary text-white py-4 text-center">Orders (Warehouse)</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive"> <!-- Tabla responsiva-->
                    <table class="table table-bordered table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Username</th>
                                <th>Status</th>
                                <th>Address</th>
                                <th>Order Date</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Inventory</th> 
                                <th>Unit Photo</th>
                                <th>Delivery Proof</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                             @foreach ($orders as $item)
                             @if($item->status <> 'DELIVERED' && $item->status <> 'IN ROUTE')
                            <tr>
                                <td> {{$item->id}}</td>
                                <td> {{$item->username}}</td>
                                <td> {{$item->status}}</td>
                                <td> {{$item->address}}</td>
                                <td> {{$item->order_date}}</td>
                                <td> {{$item->product_name}}</td>
                                <td> {{$item->ordered_quantity}}</td>
                                <td> {{$item->available_quantity}}</td>
                                <td>
                                    @if($item->PathPhoto1)
                                        <img src="{{$item->PathPhoto1}}" alt="" class="w-300 img-fluid">
                                    @elseif($item->status == 'IN PROCESS')
                                        <form action="{{ route('orders.update_photo', ['id' => $item->id, 'photo' => 1]) }}" method="POST">
                                        @csrf
                                        @method('post')
                                            <button type="submit" class="btn btn-primary">Upload Photo</button>
                                        </form>
                                    @else
                                        Mark the order as in progress to continue
                                    @endif
                                </td>
                                <td>
                                    @if($item->PathPhoto2)
                                        <img src="{{$item->PathPhoto2}}" alt="" class="w-300 img-fluid">
                                    @else
                                        NO IMAGE
                                    @endif
                                </td>
                                <td>
                                @if($item->ordered_quantity <= $item->available_quantity)

                                    @if($item->PathPhoto1)
                                    <form action="{{ route('orders.update_status', ['id' => $item->id, 'status' => 3]) }}" method="POST">
                                    @csrf
                                    @method('post')
                                        <button type="submit" class="btn btn-danger">Mark as: In route</button>
                                    </form>
                                    @elseif($item->status <> 'IN PROCESS')
                                    <form action="{{ route('orders.update_status', ['id' => $item->id, 'status' => 2]) }}" method="POST">
                                    @csrf
                                    @method('post')
                                        <button type="submit" class="btn btn-primary">Mark as: In process</button>
                                    </form>
                                    @endif
                                       
                                @else
                                    <button type="submit" class="btn btn-success">Buy materials</button>
                                @endif
                                    
                                </td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <section class="edge-to-edge">
   </div>
</body>
</html>
