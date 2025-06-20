@extends('template.template')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('container')
    <div class="contairner-fluid d-flex justify-content-center align-items-center vh-100" data-image="../img/full-screen-image-2.jpg">
        <div class="row w-auto">
                <div class="card p-4">
                    <div class="card-header">
                        <h5 class="text-center">MODULO TRANSPORTE</h5>
                    </div>
                    <div class="card-body">
                            <form id="datesLogin">
                                <div class="col mb-4">
                                    <label for="dni">Ingrese Usuario</label>
                                    <input type="text" name="dni" id="dni" class="form-control" placeholder="Ingrese usuario">
                                </div>
                                <div class="col mb-4">
                                    <label for="pass">Ingrese Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese contraseña">
                                </div>
                                <div class="col mb-4 d-flex justify-content-center">
                                    <button class="btn btn-warning" type="submit">Ingresar al Sistema</button>
                                </div>
                                
                            </form>
                    </div>
                </div>
        </div>   
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/pages/login.js'])
@endpush