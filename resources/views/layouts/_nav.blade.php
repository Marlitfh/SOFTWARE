<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            {!! Html::image('melody/images/faces/face5.jpg') !!}
          </div>
          <div class="profile-name">
            <p class="name" style="font-size:0.9em;">  
              {{$user_session}}
            </p>
          </div>
        </div>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts02" aria-expanded="false"
          aria-controls="page-layouts02">
          <i class="fas fa-chart-line menu-icon"></i>
          <span class="menu-title" >Reportes</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts02">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link" href="{{route('reports.purchases')}}">Compras</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link" href="{{route('reports.sales')}}">Ventas</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{route('reports.salesdate')}}">Venta por fecha</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{route('reports.productstates')}}">Estado de producto</a>
            </li>
          </ul>
        </div>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('purchases.index')}}">
          <i class="fa fa-cart-plus menu-icon"></i>
          <span class="menu-title">Compras</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
          <i class="fas fa-shopping-cart menu-icon"></i>
          <span class="menu-title">Ventas</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">
          <i class="fa fa-tags menu-icon"></i>
          <span class="menu-title">Categorías</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
          <i class="fa fa-gift menu-icon"></i>
          <span class="menu-title">Productos</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('clients.index')}}">
          <i class="fa fa-users menu-icon"></i>
          <span class="menu-title">Clientes</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('providers.index')}}">
          <i class="fas fa-truck menu-icon"></i>
          <span class="menu-title">Proveedores</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
          aria-controls="page-layouts">
          <i class="fa fa-cogs menu-icon"></i>
          <span class="menu-title">Configuración</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.index')}}">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">Usuarios</span>
              </a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-users-cog menu-icon"></i>
                <span class="menu-title">Roles</span>
              </a>
            </li>

            <li class="nav-item d-none d-lg-block">
              <a class="nav-link" href="{{route('companies.index')}}">
                <i class="fas fa-building menu-icon"></i>
                <span class="menu-title">Empresa</span>
              </a>
            </li>
            
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{route('printers.index')}}">Impresora</a>
            </li> --}}

          </ul>
        </div>
      </li>
      
    </ul>
  </nav>