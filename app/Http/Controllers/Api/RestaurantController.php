<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $numOfRestaurants=10;
    
    public function index(){
        $restaurants = Restaurant::with('user' , 'types')->paginate(10);
        
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show(Restaurant $restaurant){
        $restaurant = Restaurant::with('user', 'types')->findOrFail($restaurant->id);
        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }
}