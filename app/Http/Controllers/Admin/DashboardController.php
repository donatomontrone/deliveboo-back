<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::user()->restaurant) {
            abort(403);
        } else {
            $restaurant = Restaurant::where('id',  Auth::user()->restaurant->id)->first();
            return view('admin.dashboard', compact('restaurant'));
        }
    }
}
