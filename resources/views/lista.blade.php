@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lista as $listas)
                        <tr>
                            <th>{{ $listas->nspname }}</th>
                            <th>
                                <a class="btn btn-sm btn-warning" href="{{ route('mostrar',$listas->nspname) }}">Ver</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection