<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">  
  <div class="container-fluid">
       
          <button class="navbar-toggler" type="button" data-bs-toggle="dropdown" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
        <li><a class="dropdown-item" onclick="event.preventDefault(); cerrarSession.submit()">Cerrar Sesion</a></li> <form action="{{ route('logout') }}" id="cerrarSession" method="POST">
        @csrf
        </form>
        </ul></span>
          </button>
          <a class="navbar-brand" aria-current="page" href="{{ route('cursos.index') }}">Cursos</a>
  <a class="navbar-brand" href="{{ route('dashboard') }}">Inicio</a>

        <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        </ul>
  <ul class="navbar-nav ms-auto">
  <li class="nav-item dropdown">
  <a class="navbar-brand" href="#" role="button" data-bs-toggle="" aria-expanded="false">
        {{ Auth::user()->usu_nombres}} / {{ Auth::user()->name}}
        </a>

       
        </li>
  </ul>
  </div>
  </div>
</nav>



<!--<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">

  <div class="container-fluid" >
  <a class="navbar-brand"  href="{{ route('cursos.index') }}">Cursos</a>  
  <a class="navbar-brand" href="#">clases</a>
  <a class="nav-link drpdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->usu_nombres}}/{{Auth::user()->name}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>


        

      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item">
        <li><a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a></li>


<a class="nav-link" onclick="event.preventDefault();cerrarSession.submit()">Cerrar Sesion</a><form action="{{ route('logout') }}" id="cerrarSession" method="POST">
@csrf
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>

  </div>
</nav>





