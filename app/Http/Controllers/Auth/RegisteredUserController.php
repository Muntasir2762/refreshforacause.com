<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Traits\AlertTrait;

class RegisteredUserController extends Controller
{
    use AlertTrait;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()->min(6)
            ],
        ]);

        $user = new User();
        $user->first_name =  $request->name;
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        event(new Registered($user));

        return redirect()
            ->route('login')
            ->with(
                $this->successAlert('Registered Successfully, use your credentials to login')
            );
    }
}
