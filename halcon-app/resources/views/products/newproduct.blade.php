<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                    <h2 class="card-title">Add Product</h2>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                       
                        <div class="form-group">
                            <label for="product_name">Product name:</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="supplier_name">Supplier:</label>
                            <input type="text" id="supplier_name" name="supplier_name" class="form-control" required>
                        </div>
                     
                        <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
