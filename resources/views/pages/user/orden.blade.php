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
                        <span class="fs-5 fw-semibold">CREAR ORDEN</span>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                            <button type="button" class="btn btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#modalCreateOrder" id="btnModalOrder">
                                Ingresar Orden
                            </button>
                            <x-modals.users.create-order/>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                        <i class="fa-solid fa-book m-3"></i>
                        <h5 class="fw-semibold">TABLA DE ORDENES DE PAGO</h5>    
                </div>
                <div class="d-flex align-items-center">
                        <p class="fw-light text-secondary px-5">En la siguiente tabla encontrará todas las ordenes generadas</p>   
                </div>
                <div class="d-flex align-items-center">
                        <div class="table-responsive w-100 px-5">
                            <table class="table" id="tableOrderRegister"  class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Monto</th>
                                        <th class="text-center">Persona</th>
                                        <th class="text-center">Fecha de Creacion</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div> 
                </div>
        </div>  
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/pages/user/orden/create.js'])
@endpush/