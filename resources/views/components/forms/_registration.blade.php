<form action="#" class="user-form" method="post">
    @csrf
    <fieldset>
        <p class="label">Email</p>
        <label>
            <input type="email" name="email" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <p class="label">Пароль</p>
        <label>
            <input type="password" name="password" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <p class="label">Повторіть пароль</p>
        <label>
            <input type="password" name="password_confirmation" value="" placeholder="" required>
        </label>
    </fieldset>

    <fieldset>
        <button type="submit" name="submit" class="btn btn-main">
            Зареєструватися
        </button>
    </fieldset>


</form>
