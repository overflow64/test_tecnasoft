@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Bookings di {{$customer->full_name}}</h2>
        </div>
    </div>
</div>
@if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

<table class="table">
<thead>
    <th>Id</th>
    <th>Servizio</th>
    <th>Prezzo al dettaglio</th>
    <th>Prezzo all'ingrosso</th>
    <th>Point</th>
    <th>Data</th>
  
</thead>
<tbody>
   
@foreach ($bookings as $booking)
{{--dd($booking->pointService)--}}
    <tr>
        <td>{{$booking->id}}</td>
        <td>{{$booking->pointService->service->nome}}</td>
        <td>{{$booking->pointService->service->prezzo_dettaglio}}</td>
        <td>{{$booking->pointService->price_point}}</td>
        <td>{{$booking->pointService->point->nome}}</td>
        <td>{{$booking->date}}</td>
        
        <td>
            
        </td>
    </tr>
@endforeach
</tbody>
</table>

<!--
qui ci va, ad esempio, un componente livewire con un form simile a quello salvato nel path _docs/appunti.txt
faccio il bind di point_id tra la logica del componente livewire e la view
quindi quando scelgo il point_id la logica del componente vede che il point è cambiato e va a rirenderizzare e 
popolare la tendina relativa ai servizi ATTIVI ($point->services()->wherePivot('is_active',true)->get()) del point scelto.
Alla fine salvo le scelte fatte in bookings. 

Possiamo anche farlo con AlpineJS o con del semplice javascript
-->

@endsection

