@extends('layouts.main')

@section('title')
    Регистрация
@endsection

@section('content')
    <form action="{{ route('user.reg.post') }}" method="post" class="row row-cols-lg-auto g-3 align-items-center m-auto flex-column">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
        <div class="mb-3">
            <label for="fio" class="form-label">ФИО</label>
            @error('fio')
                <p class="text-danger form-text">{{$message}}</p>
            @enderror
            <input value="{{old('fio')}}" class="form-control" id="fio" name="fio" type="text">
        </div>
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
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            @error('password_confirmation')
                <p class="text-danger form-text">{{$message}}</p>
            @enderror
            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            @error('email')
                <p class="text-danger form-text">{{$message}}</p>
            @enderror
            <input value="{{old('email')}}" class="form-control" id="email" name="email" type="email">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Зарегистрироваться</button>
    </form>
@endsection
