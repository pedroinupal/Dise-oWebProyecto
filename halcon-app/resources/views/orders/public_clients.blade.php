<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search orders</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #DADADB; /* Gris claro */
        }
        .card {
            margin-top: 50px;
        }
        .card-title {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Search orders by client</h2>
                </div>
                <div class="card-body">
                    <form id="searchForm" method="post" action="{{ route('orders.public_orders', ['id' => 0]) }}">
                    @csrf
                    @method('post')
                        <div class="form-group">
                            <label >Product:</label>
                            <select name="product_id" class="form-select form-control" aria-label="Default select example">
                                @forelse($clients as $client)
                                <option value="{{$client->customer_id}}">{{$client->max_username}}</option>
                                @empty
                                <option value="1">There are no clients</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Search orders</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener el elemento del menú desplegable
        var selectElement = document.querySelector('select[name="product_id"]');
        
        // Agregar un evento de cambio al menú desplegable
        selectElement.addEventListener('change', function() {
            // Obtener el valor seleccionado (customer_id)
            var customerId = this.value;
            
            // Obtener el formulario
            var formElement = document.getElementById('searchForm');
            
            // Obtener la ruta base del action actual
            var baseRoute = formElement.getAttribute('action').split('/')[0];
            
            // Construir la nueva acción con el customer_id seleccionado
            var newAction = baseRoute + '/public_orders/' + customerId;
            
            // Actualizar el atributo 'action' del formulario con la nueva acción
            formElement.setAttribute('action', newAction);
        });
    });
</script>
