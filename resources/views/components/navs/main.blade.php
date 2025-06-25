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
					<i class="fa-solid fa-house me-2"></i> Inicio
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
					<i class="fa-solid fa-user me-2"></i> Usuarios
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
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#periodo-collapse" aria-expanded="false">
					<i class="fa-solid fa-calendar me-2"></i> Periodo
				</button>
				<div class="collapse" id="periodo-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="{{route('create_period')}}" class="text-white d-inline-flex text-decoration-none rounded">Crear Periodo</a></li>
				</ul>
				</div>
			</li>
		@endif
			@if(auth()->user()->hasRole('user'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#tazas-collapse" aria-expanded="false">
					<i class="fa-solid fa-money-check-dollar me-2"></i> Tazas
				</button>
				<div class="collapse" id="tazas-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="{{route('create_rate')}}" class="text-white d-inline-flex text-decoration-none rounded">Crear Tazas</a></li>
				</ul>
				</div>
			</li>
		@endif
		@if(auth()->user()->hasRole('user'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#orden-collapse" aria-expanded="false">
					<i class="fa-solid fa-pen-clip me-2"></i> Orden Pago
				</button>
				<div class="collapse" id="orden-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="{{route('create_order')}}" class="text-white d-inline-flex text-decoration-none rounded">Generar O. P.</a></li>
				</ul>
				</div>
			</li>
		@endif
		@if(auth()->user()->hasRole('user'))
			<li class="mb-1">
				<button class="text-white btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed w-100" data-bs-toggle="collapse" data-bs-target="#report-collapse" aria-expanded="false">
					 	<i class="fa-solid fa-chart-simple me-2"></i>Reportes
				</button>
				<div class="collapse" id="report-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small w-100 mx-3">
					<li class="py-2"><a href="#" class="text-white d-inline-flex text-decoration-none rounded">Reportes</a></li>
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