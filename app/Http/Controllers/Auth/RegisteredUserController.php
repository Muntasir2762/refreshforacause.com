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
use App\Traits\HelperTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    use AlertTrait, HelperTrait;
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

    public function surfaceUserRegister(): View
    {
        return view('frontend.pages.fe-register');
    }

    public function surfaceUserRegistrationStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $member = new User();

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->unique_ref = $this->generateUniqueCode();
        $member->full_name_slug = Str::slug($request->name . $request->last_name ? $request->last_name : '');
        $member->role = 'user';

        $member->save();

        return redirect()
            ->route('frontend.users.login')
            ->with($this->successAlert('Registration complete! Log in to explore'));
    }
}
