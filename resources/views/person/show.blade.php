@extends('layouts.app')

@if(!auth()->user()->hasVerifiedEmail())
    <div class="card" style="background:#fff7e6">
        <p>
            Нужно подтвердить email.
        </p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button>Отправить письмо еще раз</button>
        </form>
    </div>
@endif

@section('content')
    <div class="card">
        <h2>Профиль</h2>

        <p><strong>Имя:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Длина червя:</strong> {{ $user->worm_length }}</p>

        <form method="POST" action="{{ route('person.delete') }}">
            @csrf
            @method('DELETE')
            <button>Удалить профиль</button>
        </form>

        <br>
        <button class="secondary">Премиум (скоро)</button>

    </div>
@endsection
