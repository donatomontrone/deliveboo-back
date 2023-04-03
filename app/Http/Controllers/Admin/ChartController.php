<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $totalOrders = Order::selectRaw('DATE_FORMAT(date, "%Y-%m") as month, COUNT(*) as total_orders')
            ->whereHas('dishes.restaurant.user', function ($query) use ($user_id) {
                $query->where('id', $user_id);
            })
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $totalPrice = Order::selectRaw('DATE_FORMAT(date, "%Y-%m") as month, SUM(total_price) as revenue')
            ->whereHas('dishes.restaurant.user', function ($query) use ($user_id) {
                $query->where('id', $user_id);
            })
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $labels = [];
        $dataOrders = [];
        $dataRevenue = [];

        foreach ($totalOrders as $order) {
            $labels[] = Carbon::createFromFormat('Y-m', $order->month)->format('M Y');
            $dataOrders[] = $order->total_orders;
        }

        foreach ($totalPrice as $price) {
            $dataRevenue[] = $price->revenue;
        }

        return view('admin.orders.charts.index', compact('dataOrders', 'dataRevenue', 'labels'));
        // $user = Auth::user();

        // $totalPrice = Order::select(DB::raw('YEAR(orders.date) year, MONTH(orders.date) month,SUM(orders.total_price) as revenue'))
        //     ->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
        //     ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
        //     ->join('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
        //     ->join('users', 'restaurants.user_id', '=', 'users.id')
        //     ->where('users.id', $user->id)
        //     ->groupBy('year', 'month')
        //     ->orderBy('year', 'asc')
        //     ->orderBy('month', 'asc')
        //     ->get();

        // $totalOrders = Order::select(DB::raw('YEAR(orders.date) year, MONTH(orders.date) month, COUNT(*) as total_orders'))
        //     ->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
        //     ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
        //     ->join('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
        //     ->join('users', 'restaurants.user_id', '=', 'users.id')
        //     ->where('users.id', Auth::user()->id)
        //     ->groupBy('year', 'month')
        //     ->orderBy('year', 'asc')
        //     ->orderBy('month', 'asc')
        //     ->get();

        // $labels = [];
        // $dataOrders = [];
        // $dataRevenue = [];

        // // Loop through all months in a year
        // for ($month = 1; $month <= 12; $month++) {
        //     $monthOrders = $totalOrders->where('month', $month)->first();
        //     if ($monthOrders) {
        //         $labels[] = Carbon::createFromDate($monthOrders->year, $monthOrders->month, 1)->format('M Y');
        //         $dataOrders[] = $monthOrders->total_orders;
        //     } else {
        //         $labels[] = Carbon::createFromDate(null, $month, 1)->format('M Y');
        //         $dataOrders[] = 0;
        //     }

        //     $monthRevenue = $totalPrice->where('month', $month)->first();
        //     if ($monthRevenue) {
        //         $dataRevenue[] = $monthRevenue->revenue;
        //     } else {
        //         $dataRevenue[] = 0;
        //     }
        // }
        return view('admin.orders.charts.index', compact('dataOrders', 'dataRevenue', 'labels'));
    }
}


// public function ordersStatistics()
// {
//     $restaurant = auth()->user()->restaurant;

//     $dishes = $restaurant->dishes()->withCount('orders')->orderBy('orders_count', 'desc')->get();

//     $data1 = [
//         'labels' => $dishes->pluck('name'),
//         'datasets' => [
//             [
//                 'label' => 'Orders per Dish',
//                 'backgroundColor' => '#f87979',
//                 'data' => $dishes->pluck('orders_count'),
//             ],
//         ],
//     ];

//     // Statistiche per i guadagni mensili
//     $monthlyRevenue = $restaurant->orders()->selectRaw('SUM(total_price) as revenue, MONTH(created_at) as month')
//         ->groupBy('month')->get();

//     $data2 = [
//         'labels' => $monthlyRevenue->pluck('month'),
//         'datasets' => [
//             [
//                 'label' => 'Monthly Revenue',
//                 'backgroundColor' => '#36A2EB',
//                 'data' => $monthlyRevenue->pluck('revenue'),
//             ],
//         ],
//     ];

//     return view('orders_statistics', compact('data1', 'data2'));
// }