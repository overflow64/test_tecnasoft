@extends('layouts.app')
@section('title-dinamico')
    Lista Customers
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customers inseriti</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Inserisci nuovo customer</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-5">
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
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->cognome }}</td>
                <td>{{ $customer->nome }}</td>
                <td>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('customers.bookings.index', $customer) }}">Prenotazioni</a>

                        <a class="btn btn-primary" href="{{ route('customers.edit', $customer->id) }}">Mod</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-primary">Del</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $customers->links() !!}
@endsection
