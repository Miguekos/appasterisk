@extends('layouts.app')

@section('content')
    <style>
        .minusc{
            text-transform: lowercase;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Campaña</h3></div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>El nombre de la campaña ya existe..!!</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <label for="">Nombre de la campaña</label>
                        <input type="text" autofocus name="namedb" class="form-control minusc">

                        <label for="">Subir Campaña</label>
                        <input type="file" name="archivo" class="form-control">
                    </div>
                    <div class="panel-footer">
                        <input class="btn btn-success" type="submit" value="Subir">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
