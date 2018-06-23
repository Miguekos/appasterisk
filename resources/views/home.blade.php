@extends('layouts.app')

@section('content')
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
                <form action="{{ route('import') }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel-body">


                        <label for="">Nombre de la campaña</label>
                        <input type="text" name="namedb" class="form-control">

                        <label for="">Nombre del csv</label>
                        <input type="text" name="namecsv" class="form-control">

                        <label for="">Subir Campaña</label>
                        <input type="file" name="" class="form-control">
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
