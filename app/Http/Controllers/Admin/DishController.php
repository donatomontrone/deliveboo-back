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
        'description' => ['required', 'string', 'min:5'],
        'ingredients' => ['required', 'string', 'min:2', 'max:255'],
        'price' => ['required', 'numeric'],
        'category_id' => 'required|exists:categories,id',
        'is_visible' => ['required']
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
            abort(404, 'Page not found');
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
            abort(403, 'Access not allowed');
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
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        $newDish = new Dish();
        $newDish->fill($data);
        $newDish->save();
        return redirect()->route('admin.dishes.index')->with('message-create', "$newDish->name has been create");
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
            abort(403, 'Access not allowed');
        }
        $restaurant = Auth::user()->restaurant->id;
        if ($restaurant !== $dish->restaurant_id) {
            abort(403, 'Access not allowed');
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
            abort(403, 'Access not allowed');
        }
        $restaurant = Auth::user()->restaurant->id;
        if ($restaurant !== $dish->restaurant_id) {
            abort(403, 'Access not allowed');
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
        $data = $request->validate($this->rules);
        $data['slug'] = Str::slug($data['name']);
        $data['restaurant_id'] = Auth::user()->restaurant->id;

        //  Se nella tabella piatti è già presente lo slug
        //  allora abort 'vedere che codice inserire';
        //  altrimenti salvare il nuovo piatto
        if (DB::table('dishes')->where('slug', $data['slug'])->first()) {
            abort(409, 'the slug is already registered');
        } else {
            $data['slug'] =  Str::slug($data['name']);
            $data['restaurant_id'] = Auth::user()->restaurant->id;
            if ($request->hasFile('img_path')) {
                if (!$dish->isAnUrl()) {
                    Storage::delete($dish->img_path);
                }
                $data['img_path'] =  Storage::put('imgs/', $data['img_path']);
            }
            $dish->update($data);
            return redirect()->route('admin.dishes.index')->with('message', "$dish->name has been successfully updated")->with('alert', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if (!$dish->isAnUrl()) {
            Storage::delete($dish->img_path);
        }
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('message', "$dish->name has been deleted")->with('alert', 'danger');;
    }
}
