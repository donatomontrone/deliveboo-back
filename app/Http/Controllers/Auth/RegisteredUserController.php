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


        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'restaurant_name' => ['required', 'string', 'min:3', 'max:100'],
                'restaurant_address' => ['required', 'string', 'min:6', 'max:255'],
                'VAT' => ['required', 'size:11', 'unique:restaurants'],
                'restaurant_img_path' => ['image', 'max:1024'],
                'types' => ['required', 'array', 'exists:types,id', 'in:1']
            ],
            [
                'name.required' => 'Inserisci il tuo nome.',
                'name.string' => 'Il nome deve essere una stringa.',
                'name.max' => 'Il nome deve essere massimo di :max caratteri.',
                'surname.required' => 'Inserisci il tuo cognome.',
                'surname.string' => 'Il cognome deve essere una stringa.',
                'surname.max' => 'Il cognome deve essere massimo di :max caratteri.',
                'email.require' => 'Inserisci la tua mail.',
                'email.email' => 'Il campo inserito non è una mail valida.',
                'email.string' => 'L\'email deve essere una stringa.',
                'email.max' => 'La mail deve essere massimo di :max caratteri.',
                'email.unique' => 'La mail è già registrata nei nostri sistemi.',
                'password.confirmed' => 'Conferma la tua password.',
                'password.required' => 'Inserisci obbligatoriamente la passoword.',
                'restaurant_name.required' => 'Inserisci il nome del tuo ristorante.',
                'restaurant_name.string' => 'Il nome del ristorante deve essere una stringa.',
                'restaurant_name.min' => 'Il nome del ristorante deve essere minimo di :min caratteri.',
                'restaurant_name.max' => 'Il nome del ristorante deve essere masssimo di :max caratteri.',
                'restaurant_address.required' => 'Inserisci l\'indirizzo del tuo ristorante.',
                'restaurant_address.string' => 'L\'indirizzo del ristorante deve essere una stringa.',
                'restaurant_address.min' => 'L\'indirizzo del ristorante deve essere minimo di :min caratteri.',
                'restaurant_address.max' => 'L\'indirizzo del ristorante deve essere masssimo di :max caratteri.',
                'VAT.required' => 'Inserisci la tua partita IVA.',
                'VAT.size' => 'La partita iva deve essere di :size caratteri.',
                'VAT.unique' => 'La partita IVA è già presente nei nostri sistemi.',
                'restaurant_img_path.image' => 'Il file inserito deve essere una immagine (jpg, jpeg, png, bmp, gif, svg, or webp).',
                'restaurant_img_path.max' => 'La grandezza del file deve essere massimo di :max kb.',
                'types.required' => 'Inserisci almeno un tipo di cucina per il tuo ristorante.',
                'types.array' => 'Inserisci almeno un tipo di cucina per il tuo ristorante.',
                'types.exists' => 'Il tipo di cucina inserito non è valido.',
                'types.in' => 'Seleziona almeno un tipo di cucina.'
            ]
        );

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
            'img_path' => ($request->hasFile('img_path')) ? Storage::put('imgs/', $request->restaurant_img_path) : null,
        ]);



        $user->restaurant()->save($restaurant);
        $restaurant->types()->sync($request->types ?? []);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}
