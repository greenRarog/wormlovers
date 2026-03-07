<h2>Восстановление пароля</h2>

<form
    hx-post="/forgot"
    hx-target="#auth-box"
    hx-swap="innerHTML">

    @csrf

    <input name="email" placeholder="Email">

    <button>Отправить письмо</button>

</form>

<br>

<a href="/login">Назад ко входу</a>
