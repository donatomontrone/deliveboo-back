<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DishController extends Controller
{
    /**
     * Validation Rules
     * Regole di validazione
     * 
     */
    protected $rules =
    [
        'name' => ['required', 'string', 'min:3', 'max:40'],
        'description' => ['string', 'min:5'],
        'ingredients' => ['required', 'string', 'min:2', 'max:255'],
        'price' => ['required', 'numeric'],
        'img_path' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        'category_id' => 'required|exists:categories,id',
        'is_visible' => ['required']
    ];

    protected $messages =
    [
        'name.required' => 'Inserisci il nome del piatto.',
        'name.string' => 'Il nome del piatto deve essere una stringa.',
        'name.min' => 'Il nome del piatto deve essere minimo di :min caratteri.',
        'name.max' => 'Il nome del piatto deve essere massimo di :max caratteri.',
        'description.string' => 'La descrizione deve essere una stringa.',
        'description.min' => 'La descrizione deve essere minimo di :min caratteri.',
        'ingredients.required' => 'Inserisci gli ingredienti del piatto.',
        'ingredients.string' => 'Gli ingredienti devono essere una stringa.',
        'ingredients.min' => 'Questo campo deve contenere minimo :min caratteri.',
        'ingredients.max' => 'Questo campo deve contenere massimo :max caratteri.',
        'price.required' => 'Inserisci il prezzo unitario del piatto.',
        'price.numeric' => 'Il prezzo deve essere numerico.',
        'img_path.image' => 'Il file inserito deve essere una immagine (jpg, jpeg, png, bmp, gif, svg, or webp).',
        'img_path.mimes' => 'Il file inserito deve essere una immagine (jpg, jpeg, png, bmp, gif, svg, or webp).',
        'img_path.max' => 'La grandezza del file deve essere massimo di :max kb.',
        'category_id.required' => 'Seleziona la categoria del piatto.',
        'category_id.exists' => 'Inserisci una categoria valida.',
        'is_visible.required' => 'Seleziona se il piatto è visibile o meno.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->restaurant) {
            $restaurant = Auth::user()->restaurant->id;
            $dishes = Dish::where('restaurant_id',  $restaurant)->get();
            return view('admin.dishes.index', compact('dishes', 'restaurant'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dish $dish)
    {

        if (!Auth::user()->restaurant) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.dishes.create', compact('dish', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        $data['slug'] = Str::slug($data['name']);
        $num = 1;
        while (DB::table('dishes')->where('slug', $data['slug'])->first()) {
            $slug = Str::slug($data['name']) . '-' . $num;
            $num++;
            $data['slug'] = $slug;
        }
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        $data['img_path'] =  Storage::put('imgs/', $data['img_path']);
        $newDish = new Dish();
        $newDish->fill($data);
        $newDish->save();

        return redirect()->route('admin.dishes.index')->with('message-create', "$newDish->name è stato creato correttamente!");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {

        if (!Auth::user()->restaurant) {
            abort(403);
        }
        $restaurant = Auth::user()->restaurant->id;
        if ($restaurant !== $dish->restaurant_id) {
            abort(403);
        }

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        if (!Auth::user()->restaurant) {
            abort(403);
        }
        $restaurant = Auth::user()->restaurant->id;
        if ($restaurant !== $dish->restaurant_id) {
            abort(403);
        }

        $categories = Category::all();
        return view('admin.dishes.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $newRules = $this->rules;
        $newRules['slug'] = ['string', Rule::unique('dishes')->ignore($dish->id)];
        $data = $request->validate($newRules);
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        if ($request->hasFile('img_path')) {
            if (!$dish->isAnUrl()) {
                Storage::delete($dish->img_path);
            }
            $data['img_path'] =  Storage::put('imgs/', $data['img_path']);
        }
        $dish->update($data);
        return redirect()->route('admin.dishes.index')->with('message', "$dish->name è stato aggiornato correttamente!")->with('alert', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if ($dish->img_path) {
            if (!$dish->isAnUrl()) {
                Storage::delete($dish->img_path);
            }
        }
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('message', "$dish->name è stato eliminato!")->with('alert', 'danger');
    }

    public function enableToggle(Dish $dish)
    {
        $dish->is_visible = !$dish->is_visible;
        $dish->save();

        $message = ($dish->is_visible) ? "invisible" : "visible";
        return redirect()->back()->with('alert-type', 'success')->with('alert-message', "$dish->is_visible:&nbsp;<b>$message</b>");
    }
}
