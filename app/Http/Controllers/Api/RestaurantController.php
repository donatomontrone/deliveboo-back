<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $numOfRestaurants=10;
    
    public function index(){
        $types = Type::all();
        $restaurants = Restaurant::with('user' , 'types')->paginate(10);
        
        return response()->json([
            'success' => true,
            'results' => ['restaurants' => $restaurants , 'types' => $types],
        ]);
    }

    public function show(Restaurant $restaurant){
        $categories = Category::all();
        $restaurant = Restaurant::with('user', 'types','dishes')->findOrFail($restaurant->id);
        return response()->json([
            'success' => true,
            'results' => ['restaurant' => $restaurant , 'categories' => $categories]
        ]);
    }
}