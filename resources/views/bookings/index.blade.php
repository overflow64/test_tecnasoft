@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tutte le Bookings</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success mt-4">
            <p>{{ $message }}</p>
        </div>
    @endif

<table class="table">
<thead>
    <th>Id</th>
    <th>Servizio</th>
    <th>Cognome</th>
    <th>Nome</th>
    <th>Data</th>
  
</thead>
<tbody>
   
@foreach ($bookings as $booking)
{{--dd($booking->pointService)--}}
    <tr>
        <td>{{$booking->id}}</td>
        <td>{{$booking->pointService->service->nome}}</td>
        <td>{{$booking->customer->cognome}}</td>
        <td>{{$booking->customer->nome}}</td>
        <td>{{$booking->date}}</td>
        
        <td>
            
        </td>
    </tr>
@endforeach
</tbody>
</table>
@endsection