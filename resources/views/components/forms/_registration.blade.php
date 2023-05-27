<form action="#" class="user-form" method="post">
    @csrf
    <fieldset>
        <p class="label">Email:</p>
        <label>
            <input type="email" name="email" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <p class="label">Пароль:</p>
        <label>
            <input type="password" name="password" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <p class="label">Повторіть пароль:</p>
        <label>
            <input type="password" name="password_confirmation" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <button type="submit" name="submit" class="btn btn-main">
            Зареєструватися
        </button>
    </fieldset>

    @if (Route::has('login'))
        <div class="note mb-1">
            <span>Вже зареєстровані?</span>
            <a href="{{ route('login') }}" class="colored">Увійдіть в аккаунт</a>
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
