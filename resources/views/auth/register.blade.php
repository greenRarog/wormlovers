@extends('layouts.app')

@section('content')

    <div class="card">

        <h2>Регистрация</h2>

        <form method="POST" action="/reg">

            @csrf

            <input name="name" placeholder="Имя">

            <input name="email" placeholder="Email">

            <input type="password" name="password" placeholder="Пароль">

            <button>Создать аккаунт</button>

        </form>

        <br>

        <a href="/login">Уже есть аккаунт? Войти</a>

    </div>

@endsection
