<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
   
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
       
    </style>
    
</head>
<header>
    @include('components.nav-bar')
</header>
<body>
   <div class="container">
        <div class="row">
            <div class="col-6"> <!-- Utilizamos una columna de 6 para alinear el título a la izquierda -->
                <h1 class="bg-primary text-white text-center py-4">Customers</h1>
            </div>
            <div class="col-4 text-end"> <!-- Utilizamos una columna de 6 para alinear el botón a la derecha -->
                <button type="button" class="btn btn-success mt-4 me-3">Add customer</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive"> <!-- Tabla responsiva-->
                    <table class="table table-bordered table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>RFC</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                             @foreach ($customers as $item)

                            <tr>
                                <td> {{$item->id}}</td>
                                <td> {{$item->name}}</td>
                                <td> {{$item->username}}</td>
                                <td> {{$item->rfc}}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </div>
</body>
</html>
