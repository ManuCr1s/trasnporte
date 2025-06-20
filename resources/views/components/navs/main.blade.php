<main class="d-flex flex-nowrap vh-100">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center  text-white text-decoration-none">
      <span class="fs-5 fw-semibold">TRANSPORTE</span>
    </a>
    <hr>
    <ul class="list-unstyled ps-0">
		@if(auth()->user()->hasRole('admin'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
					Inicio
				</button>
				<div class="collapse" id="home-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Graficas</a></li>
				</ul>
				</div>
			</li>
		@endif
		@if(auth()->user()->hasRole('admin'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
					Usuarios
				</button>
				<div class="collapse" id="dashboard-collapse">
					<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
						<li class="py-2"><a href="{{route('create')}}" class="text-white d-inline-flex text-decoration-none rounded">Crear Usuario</a></li>
					</ul>
				</div>
			</li>
		@endif
		@if(auth()->user()->hasRole('user'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
					Orden Pago
				</button>
				<div class="collapse" id="dashboard-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Generar O. P.</a></li>
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Anular O.P</a></li>
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Editar O.P.</a></li>
				</ul>
				</div>
			</li>
		@endif
		@if(auth()->user()->hasRole('user'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
					Reportes
				</button>
				<div class="collapse" id="orders-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Generados</a></li>
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Anular</a></li>
				</ul>
				</div>
			</li>
		@endif
 
    </ul>
	<hr>
    <div class="dropdown">
		<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
			<img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
			<strong>{{Auth::user()->name}}</strong>
		</a>
		<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
			<li><a class="dropdown-item" href="#">Ajustes</a></li>
			<li><a class="dropdown-item" href="#">Perfil</a></li>
			<li><hr class="dropdown-divider"></li>
			<li>
				<form action="{{route('logout')}}" method="post">
					@csrf
					<button class="dropdown-item">Cerrar Sesion</button>
					<!-- <a class="dropdown-item" href="#">Cerrar Sesion</a> -->
				</form>
			</li>
		</ul>
    </div>
  </div>
</main>