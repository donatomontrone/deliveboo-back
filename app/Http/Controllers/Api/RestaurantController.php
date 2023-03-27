<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $numOfRestaurants = 6;

    public function index(Request $request)
    {

        // Tipi di cucina selezionati dall'utente
        $selectedTypes = $request->input('type');
        $types = Type::all();

        // Ristoranti che corrispondono ai tipi di cucina selezionati
        $query = Restaurant::with('user', 'types');
        if (!empty($selectedTypes)) {
            $query->whereHas('types', function ($query) use ($selectedTypes) {
                $query->where('id', 'LIKE', $selectedTypes);
            });
        }
        $restaurants = $query->paginate($this->numOfRestaurants);

        return response()->json([
            'success' => true,
            'results' => [
                'restaurants' => $restaurants,
                'types' => $types,
            ],
        ]);
    }

    public function show(Restaurant $restaurant)
    {
        $categories = Category::all();
        $restaurant = Restaurant::with('user', 'types', 'dishes')->findOrFail($restaurant->id);
        return response()->json([
            'success' => true,
            'results' => ['restaurant' => $restaurant, 'categories' => $categories]
        ]);
    }
}
