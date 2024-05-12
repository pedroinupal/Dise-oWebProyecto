<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar con resaltado rojo</title>
  <style>
    /* CSS para resaltar el elemento activo en azul */
    .navbar-nav .nav-item .nav-link.active {
        color: blue;
        font-weight: bold; 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white">
  <div class="container-fluid">
    <a class="navbar-brand">
        <img src="https://lh3.googleusercontent.com/drive-viewer/AKGpihYMznxVPu8Sxmm_bqDll-nv_fboGXcTO8kY0KLa9gQL7H1vK_upUUJyoxfwXZqRUVi-_nEbzsrExI3T-hW11A8Z0aF9-Thhew=s2560" alt=""  width="70" height="70">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(Str::startsWith(Route::currentRouteName(), 'orders')) active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Orders
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item @if(Route::currentRouteName() == 'orders_all.index') active @endif" href="{{ route('orders_all.index') }}">Orders (General)</a></li>
            <li><a class="dropdown-item @if(Route::currentRouteName() == 'orders_warehouse.index') active @endif" href="{{ route('orders_warehouse.index') }}">Orders (Warehouse)</a></li>
            <li><a class="dropdown-item @if(Route::currentRouteName() == 'orders_route.index') active @endif" href="{{ route('orders_route.index') }}">Orders (Route)</a></li>
          </ul>
        </li>  
        <li class="nav-item">
          <a class="nav-link @if(Route::currentRouteName() == 'products.index') active @endif" href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Route::currentRouteName() == 'suppliers.index') active @endif" href="{{ route('suppliers.index') }}">Suppliers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Route::currentRouteName() == 'customers.index') active @endif" href="{{ route('customers.index') }}">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Route::currentRouteName() == 'employees.index') active @endif" href="{{ route('employees.index') }}">Employees</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
