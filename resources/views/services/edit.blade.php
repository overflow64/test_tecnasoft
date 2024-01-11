@extends('layouts.app')
   
@section('content')
    <div class="row mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifica serizio</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('services.index') }}"> Annulla</a>
            </div>
        </div>
    </div>
  
    @if ($errors->any())
        <div class="alert alert-danger">
        Attenzione compila tutti i campi<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.update',$service->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" value="{{ $service->nome }}" class="form-control" placeholder="Modifica il nome...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                <div class="form-group">
                    <strong>Descrizione:</strong>
                    <textarea class="form-control" style="height:150px" name="descrizione" placeholder="Descrizione">{{ $service->descrizione }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <div class="form-group">
                <strong>Prezzo al dettaglio:</strong>
                <input type="number" name="prezzo_dettaglio" value="{{ $service->prezzo_dettaglio }}" step=".01" class="form-control" placeholder="Prezzo servizio...">
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection