@extends('template.template')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('container')
    <div class="contairner-fluid d-flex justify-content-center align-items-center vh-100 bg-secondary" data-image="../img/full-screen-image-2.jpg">
        <div class="row w-25">
                <div class="card p-4">
                    <div class="card-header">
                        <h5 class="text-center">CAMBIAR CONTRASEÑA</h5>
                    </div>
                    <div class="card-body">
                            <form id="passUser">
                                <div class="col mb-4">
                                    <label for="dni">Nueva Contraseña</label>
                                    <h6 class="fw-lighter">Minimo 8 caracteres debe contener un numero, letra Mayuscula y Minuscula</h6>
                                    <input type="password" id="pass" name="password" class="form-control" placeholder="Ingrese contraseña" required>
                                    <div id="passValid" class="valid-feedback"></div>
                                </div>
                                <div class="col mb-4">  
                                    <label for="pass">Confirmar Contraseña</label>
                                    <input type="password" name="password_confirmation" id="conpass" class="form-control" placeholder="Confirmar contraseña" required>
                                    <div id="conPassValid" class="valid-feedback"></div>
                              
                                </div>
                                <div class="col mb-4 d-flex justify-content-center">
                                    <button class="btn btn-warning" type="submit">Cambiar Contraseña</button>
                                    <a class="btn btn-secondary ms-3" href="{{route('begin')}}">Volver al Aplicativo</a>
                                </div>                            
                            </form>
                    </div>
                </div>
        </div>   
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/pages/pass.js'])
@endpush