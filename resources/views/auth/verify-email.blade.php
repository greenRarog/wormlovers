@extends('layouts.app')

@section('content')

    <div class="card">

        <h2>Подтвердите email</h2>

        <p>
            Мы отправили письмо со ссылкой подтверждения.
        </p>

        <p>
            Пока email не подтвержден — кормить червя нельзя.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button>Отправить письмо еще раз</button>
        </form>

    </div>

@endsection
