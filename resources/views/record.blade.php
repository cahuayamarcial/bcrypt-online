@extends('layouts.app')
@section('title', 'Historial')
@section('description', 'Hey! ahora puedes guardar todo tu historial de textos encriptados y así evitar escribirlos nuevamente.')
@section('active-record', 'active')
@section('content')
<div id="page-head" class="container-fluid inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-title">HISTORIAL</div>
                <div class="input-hash-holder">
                    <form id="hash-generator" action="{{ route('record.store') }}">
                        <div class="input-holder">
                            <input class="hash" id="hash-text" type="text" name="text" placeholder="Escribe algo" autocomplete="off">
                            <button id="btn-encrypt" type="button">Encriptar</button>
                        </div>
                    </form>
                </div>
                 <div class="box-result-hash" id="result-error">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('others')
<div id="post-content" class="container-fluid">
    <div class="container">
        <div id="post-body" class="row">
            <div id="post-holder" class="col-md-12">
                <ul class="surveys grid">
                    <div class="row" id="result">
                        @include('list')
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="footer" class="container-fluid">
    <div class="container">
        <div class="address-holder">
            <div class="phone">Bcrypt Online 2018</div>
        </div>
    </div>
</div>
@endsection
