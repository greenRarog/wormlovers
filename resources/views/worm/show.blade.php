@extends('layouts.app')

@section('content')
    <div class="card">
        <h2>Твой червь</h2>

        <div id="worm-area">
            @include('worm.partials.worm',['user'=>$user])
        </div>

        <button
            hx-post="{{ route('worm.feed') }}"
            hx-target="#worm-area"
            hx-swap="innerHTML">
            Покормить
        </button>

    </div>
@endsection
