@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Associa servizi al punto vendita: {{$point->nome}}</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success mt-4">
            <p>{{ $message }}</p>
        </div>
    @endif
<form action="{{route('points.services.store',['point'=>$point] )}}" method="POST">
    <select name="service_id" id="service_id" class="form-control mt-4">
        <option value="-1">seleziona</option>
        @foreach($services as $service)
        <option value="{{$service->id}}">{{$service->nome}}</option>

        @endforeach
    </select>
    <div class="form-group mt-4">
        <label for="">Prezzo ingrosso</label>
        <input type="number" step=".01" class="form-control" name="price_point" id="price_point">
    </div>
    @csrf
    
    <button type="submit" class="btn btn-primary mt-4">Aggancia Servizio</button>
</form>

<table class="table">
    <thead>
        <th>Id</th>
        <th>Nome servizio</th>
        <th>Prezzo</th>
        <th>Attivo</th>
        <th>Actions</th>
    </thead>
    <tbody>
@foreach($pointServices as $service)

<tr>
    <td>{{$service->id}}</td>
    <td>{{$service->nome}}</td>
    <td>{{$service->pivot->price_point}}</td>
    <td>@if($service->pivot->is_active == true) Attivo @else Disattivato @endif</td>
    <td>
        
        <form action="{{route('points.services.status',['point'=>$point,'service'=>$service]  )}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Cambia Status</button>
        </form>
    </td>
</tr>

@endforeach
</tbody>
</table>
@endsection