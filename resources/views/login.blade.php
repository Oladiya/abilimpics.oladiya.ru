@extends('layouts.main')

@section('title')
    Вход
@endsection

@section('content')
    <form action="{{ route('user.login.post') }}" method="post" class="row row-cols-lg-auto g-3 align-items-center m-auto flex-column">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Вход</h1>
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            @error('login')
            <p class="text-danger form-text">{{$message}}</p>
            @enderror
            <input value="{{old('login')}}" class="form-control" id="login" name="login" type="text">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            @error('password')
            <p class="text-danger form-text">{{$message}}</p>
            @enderror
            <input class="form-control" id="password" name="password" type="password">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Войти</button>
    </form>
@endsection
