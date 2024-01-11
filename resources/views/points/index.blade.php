@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista dei Points</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('points.create') }}"> Inserisci nuovo Point</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-4">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-4">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Indirizzo</th>
            <th>Attivo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($points as $point)
        <tr>
            <td>{{ $point->id }}</td>
            <td>{{ $point->nome }}</td>
            <td>{{ $point->indirizzo }}</td>
            <td>{{ $point->is_active }}</td>
            <td>
                <form action="{{ route('points.destroy',$point->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('points.services.index',$point) }}">Add service</a>
    
                    <a class="btn btn-primary" href="{{ route('points.edit',$point->id) }}">Mod</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-primary">Del</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $points->links() !!}
      
@endsection