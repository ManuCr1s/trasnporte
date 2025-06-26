@extends('template.template')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('container')
    <div class="d-flex">
        <x-navs.main/>  
        <div class="w-100 p-3">
                <div class="d-flex align-items-center pb-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <i class="fa-solid fa-user m-3"></i>
                        <span class="fs-5 fw-semibold">CREAR PERIODO</span>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                            <button type="button" class="btn btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#modalAddYear">
                                Ingresar Periodo
                            </button>
                            <x-modals.users.create-period/>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                        <i class="fa-solid fa-book m-3"></i>
                        <h5 class="fw-semibold">TABLA DE HISTORICA DE PERIODO</h5>    
                </div>
                <div class="d-flex align-items-center">
                        <p class="fw-light text-secondary px-5">En la siguiente tabla encontrara todos los periodos registrados en el sistema</p>   
                </div>
                <div class="d-flex align-items-center">
                        <div class="table-responsive w-100 px-5">
                            <table class="table" id="tablePeriodRegister"  class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div> 
                </div>
                <x-modals.users.active-period/>
        </div>  
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/pages/user/period/create.js'])
@endpush/