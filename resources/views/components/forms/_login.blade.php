<form action="#" class="user-form" method="post">
    @csrf
    <fieldset>
        <p class="label">Email:</p>
        <label>
            <input type="email" name="email" value="{{ request()->input('email', old('email')) }}" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <p class="label">Пароль:</p>
        <label>
            <input type="password" name="password" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <button type="submit" name="submit" class="btn btn-main">
            Увійти
        </button>
    </fieldset>

    @if (Route::has('register'))
        <div class="note mb-1">
            <span>Немає аккаунта?</span>
            <a href="{{ route('register') }}" class="colored">Зареєструйтеся!</a>
        </div>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif


</form>
