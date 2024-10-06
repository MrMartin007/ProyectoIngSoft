@extends('adminlte::page')

@section('title', 'Byte Teach')

@section('content_header')
    <h1>Universidad Mariano Galvez</h1>
    <h1>de Guatemala</h1>


@stop

@section('content')
    <div class="galeria" >
        <div class="ima" >
            <img class="m" src="https://umg.edu.gt/assets/umg.png">
        </div>
    </div>

    <h1>Martin Alexander Lopez Castro / 0909-17-9198</h1>
    <h1>JULIO RONALDO MA CRUZ / 0909-14-13730</h1>
    <h1>WENDY MICHELLE AJBAL LÓPEZ / 1990-19-17146</h1>
        <h1>MARVIN ISAÍAS ALVARADO AJCIP / 9490-19-5528</h1>
            <h1>DELMAR ISMAEL SAC TUJ / 1490-11-990</h1>
                <h1>MARTIN ALEXANDER LOPEZ CASTRO / 0909 17 9198</h1>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .m{
            width: 30%;
            height: auto;
            margin-left: 30%;
        }

        h1{
            font-size: 25px;
            height: 10px;
            height: auto;
            margin-left: 3%;
        }
        h2{
            height: 10px;
            height: auto;
            margin-left: 40%;
        }

    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
