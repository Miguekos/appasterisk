@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="title"><h2><u>Camapaña: </u> {{ $title }}</h2></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th class="text-center">Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lista as $listas)
                        <tr>
                            <th>{{ $listas->dni }}</th>
                            <th>{{ $listas->telefono }}</th>
                            <th class="text-center">
                                <a class="btn btn-sm btn-warning" href="">Iniciar</a>
                                <a class="btn btn-sm btn-info" href="">Detener</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection