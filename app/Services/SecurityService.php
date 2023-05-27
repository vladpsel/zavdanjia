<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecurityService
{
    public array $registrationRules = [
        'email' => 'email|unique:users|min:3',
        'password' => 'min:6|required|confirmed',
    ];

//    TODO: change to lang files
    public array $registrationMessages = [
        'email.unique' => 'Такий користувач вже існує',
        'password.min' => 'Пароль повнинен бути 6 або більше символів',
        'password.confirmed' => 'Паролі не співпадають',
    ];

    public array $authRules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @throws Exception
     */
    public function register(?array $data)
    {
        if (!$data || empty($data)) {
            return null;
        }

        if (!array_key_exists('password', $data)) {
            throw new Exception('No password data');
        }

        $password = Hash::make($data['password']);

        $data['password'] = $password;
        $data['name'] = '';
        return User::create($data);
    }
}
