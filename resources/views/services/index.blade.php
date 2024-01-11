@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista Servizi Offerti da XYZ</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-success" href="{{ route('services.create') }}"> Inserisci nuovo Servizio</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-4">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered table-responsive mt-4">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Prezzo</th>
            <th width="280px">Azioni</th>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->nome }}</td>
            <td>{{ $service->prezzo_dettaglio }}</td>
            <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('services.show',$service->id) }}">Info</a>
    
                 
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-primary">Del</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $services->links() !!}
      
@endsection