<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('auth.register' , compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $data = $request->validate([
            'user' =>  [ 'name' => ['required', 'string', 'max:255'] ],
            'user' => ['surname'=> ['required', 'string', 'max:255'] ],
            'user' => ['email'=> ['required', 'string', 'email', 'max:255', 'unique:' . User::class]],
            'user' => ['password' => ['required', 'confirmed', Rules\Password::defaults()] ],
            'restaurant' => ['name' =>'required|min:3|max:100|string'],
            'restaurant' => ['address'=>'required|min:6|max:255|string'],
            'restaurant' => ['VAT'=>'required|size:11|unique:restaurants'],
            'restaurant' => ['img_path'=>'required'],
            // 'restaurant' => ['types'=>'array|exists:types,id|nullable'],
        ]);
        
        // dd($request->restaurant['name']);
        Storage::put('imgs/', $data['restaurant']['img_path']);

        
        $user = User::create($request->input('user'));
        $user->restaurant()->create($request->input('restaurant') + ['user_id' => DB::table('users')->latest('id')->first() , 'slug'=> Str::slug($request->restaurant['name'])]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}