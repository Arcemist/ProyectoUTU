<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Events\AdminRegistrationAttempt;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        switch ($request->user_type) {
            case UserType::ADMINISTRADOR->value:

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $user = User::make([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_type' => $request->user_type
                ]);

                event(new AdminRegistrationAttempt($user));
                return redirect(route('register', absolute: false));

                break;


            case UserType::EMPRESA->value:

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_type' => $request->user_type,
                ]);

                event(new Registered($user));
                Auth::login($user);
                return redirect(route('dashboard', absolute: false));

                break;


            case UserType::GUARDIA->value:

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_type' => $request->user_type,
                ]);

                event(new Registered($user));
                Auth::login($user);
                return redirect(route('dashboard', absolute: false));

                break;


            default:
                // haciendo que tire su propio error
                $request->validate([
                    'user_type' => ['required', Rule::enum(UserType::class)]
                ]);

                break;
        }
    }
}
