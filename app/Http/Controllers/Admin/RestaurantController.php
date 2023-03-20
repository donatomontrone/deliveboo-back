<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    protected $rules = [
        'name' => 'required|min:3|max:100|string',
        'address' => 'required|min:6|max:255|string',
        'VAT' => 'required|size:11|unique:restaurants',
        'img_path' => 'required|image|max:400',
        'types' => 'array|exists:types,id|nullable'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        return view('admin.dashboard', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        if (isset(Auth::user()->restaurant->id)) {
            abort(403, 'Access not allowed');
        }
        $types = Type::all();
        return view('admin.restaurants.create', compact('restaurant', 'types'));
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
        $data['user_id'] = Auth::user()->id;
        if (DB::table('restaurants')->where('slug', $data['slug'])->first()) {
            abort(409, 'The slug is already registered');
        } else {
            $data['slug'] = Str::slug($data['name']);
            $data['user_id'] = Auth::user()->id;
            $data['img_path'] =  Storage::put('imgs/', $data['img_path']);
            $newRestaurant = new Restaurant();
            $newRestaurant->fill($data);
            $newRestaurant->save();
            $newRestaurant->types()->sync($data['types'] ?? []);
        }

        return redirect()->route('admin.dashboard', $newRestaurant->slug)->with('info-message', "'$newRestaurant->name' was created successfully!")->with('alert', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}