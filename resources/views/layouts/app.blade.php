<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>wormlovers</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://unpkg.com/htmx.org@1.9.10"></script>

    <style>
        body {
            font-family: system-ui, sans-serif;
            margin:0;
            background:#fafafa;
            color:#222;
        }
        .container {
            max-width:600px;
            margin:auto;
            padding:20px;
        }
        .card {
            background:white;
            padding:20px;
            border-radius:8px;
            box-shadow:0 2px 6px rgba(0,0,0,0.05);
        }
        button {
            padding:10px 14px;
            border:none;
            border-radius:6px;
            background:#222;
            color:white;
            cursor:pointer;
        }
        button.secondary {
            background:#ddd;
            color:#222;
        }
        input {
            width:100%;
            padding:10px;
            margin-bottom:12px;
            border:1px solid #ddd;
            border-radius:6px;
        }
        .worm {
            font-size:24px;
            word-break:break-all;
        }
        nav {
            margin-bottom:20px;
            display:flex;
            gap:15px;
            align-items:center;
        }
        nav form {
            margin:0;
        }
        a { text-decoration:none; color:#222; }

        @media (max-width:480px){
            .worm { font-size:18px; }
        }
    </style>
</head>

<body hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>

<div class="container">

    <nav>
        <a href="/">Главная</a>

        @auth
            <a href="/worm">Червь</a>
            <a href="/person">Профиль</a>

            <form method="POST" action="/logout">
                @csrf
                <button class="secondary">Выход</button>
            </form>

        @else
            <a href="/login">Вход</a>
            <a href="/reg">Регистрация</a>
        @endauth

    </nav>

    @yield('content')

</div>
</body>
</html>
