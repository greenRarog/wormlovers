@extends('layouts.app')

@section('content')

    <div class="card">

        <h2>Твой червь</h2>

        <div id="worm-area">
            @include('worm.partials.worm',['user'=>$user])
        </div>

        @if(!auth()->user()->hasVerifiedEmail())

            <div class="card" style="background:#fff7e6;margin-top:15px">

                <p>
                    Чтобы кормить червя — подтвердите email.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="secondary">
                        Отправить письмо подтверждения
                    </button>
                </form>

            </div>

            <button disabled style="margin-top:10px;opacity:.5">
                Покормить
            </button>

        @else

            <button
                hx-post="{{ route('worm.feed') }}"
                hx-target="#worm-area"
                hx-swap="innerHTML"
                style="margin-top:10px">
                Покормить
            </button>

        @endif

    </div>

@endsection
