<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
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
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'string', 'min:3', 'max:100'],
            'restaurant_address' => ['required', 'string', 'min:6', 'max:255'],
            'VAT' => ['required', 'size:11', 'unique:restaurants'],
            'restaurant_img_path' => ['image', 'max:400'],
            'types' => ['array', 'exists:types,id']
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->restaurant_name,
            'slug' => (DB::table('restaurants')->where('slug', $request->slug)->first()) ?
                Str::slug($request->restaurant_name) : (Str::slug($request->restaurant_name) . '-' . $user->id),
            'address' => $request->restaurant_address,
            'VAT' => $request->VAT,
            'img_path' => Storage::put('imgs/', $request->restaurant_img_path),
        ]);



        $user->restaurant()->save($restaurant);
        $restaurant->types()->sync($request->types ?? []);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}
