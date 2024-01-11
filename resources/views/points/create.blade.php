@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inserisci un nuovo Point</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('points.index') }}"> Annulla</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        Attenzione campi mancanti<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('points.store') }}" method="POST">
    @csrf
  
     <div class="row mt-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <div class="form-group">
                <strong>Indirizzo:</strong>
                <input type="text" name="indirizzo" class="form-control" placeholder="Indirizzo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <div class="form-group">
                <strong>Descrizione:</strong>
                <textarea class="form-control" style="height:150px" name="descrizione" placeholder="Descrizione"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <div class="form-group">
                <strong>Mappa:</strong>
                <input type="text" name="mappa" class="form-control" placeholder="Mappa">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                <button type="submit" class="btn btn-primary">Inserisci Point</button>
        </div>
    </div>
   
</form>


@endsection