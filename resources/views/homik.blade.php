@extends('layouts.main')

@section('title')
    Главная
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        Вы аутентифицировались
    @else
        Вы не аутентифицировались
    @endif
@endsection
