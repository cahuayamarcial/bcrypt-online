@extends('layouts.app')
@section('title', 'Herramienta generar contraseñas hash de bcrypt')
@section('active-home', 'active')
@section('contact-header', 'contact-header')
@section('content')
<div id="page-head" class="container-fluid inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="page-title uppercase">Bcrypt online</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                 <p class="text">
                    Escribe algo y nosotros<br>nos encargamos de generar tu texto encriptado<br>con hash de bcrypt.
                 </p>
                <div class="input-hash-holder">
                    <form onsubmit="return false" id="hash-generator" action="{{ route('record.store') }}">
                        <div class="input-holder">
                            <input class="hash" id="hash-text" type="text" name="text" placeholder="Escribe algo" autocomplete="off">
                            <button id="btn-encrypt-index" type="submit">Encriptar</button>
                        </div>
                    </form>
                </div>
                <div class="box-result-hash" id="result">
                    
                </div>
                <div class="text mt-40">
                    <span class="text-footer uppercase">
                        Esta herramienta es 100% gratis y sin publicidad.
                    </span>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
