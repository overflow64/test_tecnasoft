@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inserisci un nuovo Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Annulla</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        Attenzione campi mancanti<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
  
     <div class="row mt-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cognome:</strong>
                <input type="text" name="cognome" class="form-control" placeholder="Cognome">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                <button type="submit" class="btn btn-primary">Inserisci Customer</button>
        </div>
    </div>
   
</form>


@endsection