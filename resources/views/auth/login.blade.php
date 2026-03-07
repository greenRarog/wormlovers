@extends('layouts.app')

@section('content')

    <div class="card" id="auth-box">

        <h2>Вход</h2>

        <form method="POST" action="/login">
            @csrf

            <input name="email" placeholder="Email">

            <input type="password" name="password" placeholder="Пароль">

            <button>Войти</button>

        </form>

        <br>

        <a href="/reg">Регистрация</a>

        <br><br>

        <button
            class="secondary"
            hx-get="/forgot"
            hx-target="#auth-box"
            hx-swap="innerHTML">
            Забыл пароль
        </button>

    </div>

@endsection
