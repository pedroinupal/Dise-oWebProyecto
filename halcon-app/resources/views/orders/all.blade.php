<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders (General)</title>
   
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
            <div class="col">
                <h1 class="bg-primary text-white py-4 text-center">Orders (General)</h1>
            </div>
            <div class="col-4 text-end"> <!-- Utilizamos una columna de 6 para alinear el botón a la derecha -->
                <a type="button" href="{{route('orders.create')}}" class="btn btn-success mt-4 me-3">Place order</a>
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
                                    @else
                                        NO IMAGE
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
                                    <a href="{{ route('orders.edit',$item->id)}}" class="btn btn-primary">Update order</a>
            
                                    <form action="{{ route('orders.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <input type="submit" value="Decline Order" class="btn btn-danger" onclick="return confirm('Please confirm the deletion of the order')">
                                    </form>    
                                </td>
                            </tr>

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
