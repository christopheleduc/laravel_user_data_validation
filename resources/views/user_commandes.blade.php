@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









@extends('AdminLayout')
@section('content')
    @php($i = 1)
    @foreach($orders as $order)
        @foreach($order->product as $prod)
{{--            @dd($prod->pivot->quantity)--}}
            <div class="container">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">N°Commande</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Id de l'article</th>
                        <th scope="col">Quantité</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $prod->pivot->order_id }}</th>
                        <td>{{ $order->Users->firstName }}</td>
                        <td> <a href="/product/{{ $prod->pivot->product_id }}">
                        {{ $prod->pivot->product_id }}
                        </a></td>
                        <td>{{ $prod->pivot->quantity }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @php($i++)
        @endforeach
    @endforeach
@endsection