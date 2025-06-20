@extends('template.template')
@section('container')
    <x-navs.main/>
@endsection
@push('scripts')
    @vite(['resources/js/pages/dash.js'])
@endpush