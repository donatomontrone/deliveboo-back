<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index(Request $request)
    {
        $query = Restaurant::with('types');
        $selectedTypes = $request->input('type');
        if (!empty($selectedTypes)) {
            $query->whereHas('types', function ($query) use ($selectedTypes) {
                $query->whereIn('title', $selectedTypes);
            }, '=', count($selectedTypes));
        }
        $restaurants = $query->get();

        return response()->json([
            'success' => true,
            'results' => [
                'restaurants' => $restaurants,
                'types' => Type::all(),
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
