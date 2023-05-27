<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use App\Models\User;
use App\Services\SecurityService;
use App\Traits\BasicControllerTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    use BasicControllerTrait;

    private SecurityService $securityService;

    public function __construct(Request $request, SecurityService $securityService)
    {
        $this->request = $request;
        $this->securityService = $securityService;
    }

    public function login(): View|Factory|RedirectResponse|Application
    {
        if (!empty(Auth::user())) {
            return redirect()->route('app.home');
        }

        if ($this->postSubmitted()) {
            $credentials = $this->request->validate($this->securityService->authRules);

            if (Auth::attempt($credentials)) {
                $this->request->session()->regenerate();
                return redirect()->route('app.home');
            }

            return back()->withErrors([
                'error' => 'Логін або пароль не вірні',
            ])->onlyInput('email');
        }

        return view('security.login');
    }

    public function register(): View|Factory|RedirectResponse|Application
    {
        if (!empty(Auth::user())) {
            return redirect()->route('app.home');
        }

        if ($this->postSubmitted()) {
            $data = $this->request->validate(
                $this->securityService->registrationRules,
                $this->securityService->registrationMessages,
            );
            $result = $this->securityService->register($data);

            if (!$result || empty($result) || !is_a($result, User::class)) {
                return redirect()->back();
            }

            return redirect()->route('app.home');
        }

        return view('security.register');
    }

    public function logout()
    {
        die('logout');
    }


}
