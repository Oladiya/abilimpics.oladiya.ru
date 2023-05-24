@extends('layouts.app')

@section('title')
    Личный кабинет
@endsection

@section('content')
    @if($orders->isEmpty())
        <h2 class="text-center">Вы ещё не делали заказов</h2>
    @endif
    <div class="row justify-content-center">
    @foreach($orders as $order)
        <div class="col-auto mb-3">
            <div class="card" style="width: 20rem;">
                <div class="card-header">
                    <h3 class="card-title group">Заказ №{{$order->id}}</h3>
                    <h5 class="text-info">{{$order->status}}</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$order->product->name}}</h5>
                    <p class="card-text">Цена за штуку: {{$order->product->price}} Руб.</p>
                    <p class="card-text">Количество: {{$order->col}} шт.</p>
                </div>
                <div class="card-footer">
                    <p class="card-text">Итоговая цена: {{$order->col * $order->product->price}} Руб.</p>
                    <p class="card-text">Адрес доставки: {{$order->address}}</p>
                    <p class="card-text">Дата заказа: {{date("d.m.y H:i",strtotime($order->created_at))}}</p>
                   <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-danger"
                       onclick="event.preventDefault();
                       document.getElementById('delete-order-form{{$order->id}}').submit();">
                        Удалить</a>

                    <form id="delete-order-form{{$order->id}}" method="POST" action="{{ route('orders.destroy', $order->id) }}" class="d-none">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
