<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
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
        $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','email_with_at_and_dot', 'unique:'.User::class],
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //'regex:/[0-9]/',      // must contain at least one digit
                //'regex:/[@$!%*#?&]/', // must contain a special character
                'confirmed', Rules\Password::defaults()
            ],
            'no_hp' => ['required', 'string','max:14', 'min:9'], //diawalnya harus 08
            'tanggal_lahir' => ['required'],
        ],
        [
            'name.required' => 'Nama Harus Diisi.',
            'email.email_with_at_and_dot' => 'Harus diakhiri dengan seperti .com.',
            'email.required' => 'Email Harus Diisi.',
            'email.email' => 'Format Email Harus Sesuai',
            'email.unique' => 'Email Sudah Terdaftar.',
            'password.required' => 'password Harus Diisi.',
            'password.confirmed' => 'Confirmasi password Harus Diisi dan Sesuai.',
            'password.min' => 'Password Harus 8 caracter',
            'password.regex' => 'Password Harus Berisi Huruf Kecil dan Huruf Besar',
            'no_hp.required' => 'No Hp Harus Diisi',
            'no_hp.max' => 'Jumlah Karakter Terlalu Banyak',
            'no_hp.min' => 'Jumlah Karakter Terlalu sedikit',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',

            // Add more custom error messages as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'no_hp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,

            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }

    }
}
