@extends('layouts.app')

@section('title')
    {{ __('Home') }}
@endsection

@section('content')
    <div class="container">

                <div class="row justify-content-center">
                    @foreach($products as $product)
                        <div class="col-auto mb-3">
                            <div class="card" style="width: 20rem;">
                                <div class="card-header">
                                    <h3 class="card-title group">{{ $product->name }}</h3>
                                </div>
                                <div class="card-body">
                                    <img class="card-img" src="{{ asset('assets/img') }}/{{$product->img_uri}}" alt="{{ $product->name }}">
                                    <p class="card-text">Цена за штуку: {{$product->price}} Руб.</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('orders.store', ['product' => $product->id]) }}" class="btn btn-success"
                                       onclick="event.preventDefault();
                       document.getElementById('create-order-form{{$product->id}}').submit();">
                                        Заказать</a>

                                    <form id="create-order-form{{$product->id}}" method="POST"
                                          action="{{ route('orders.store', ['product' => $product->id]) }}" class="d-none">
                                        @method('POST')
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

    </div>
@endsection
