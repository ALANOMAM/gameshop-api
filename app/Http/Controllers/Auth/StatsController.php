<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;


class StatsController extends Controller
{
    public function OrderChart()
    {
 //dalla tabella degli ordini, voglio mettere insieme i dati che mi servono
 //ovvero, ordino i dati per anno, poi per mese, e per ogni mese metto il totatle delle vendite       
$orders = Order::select(
    DB::raw('YEAR(created_at) as year'),
    DB::raw('MONTH(created_at) as month'),
    DB::raw('SUM(total_price) as total_sales')
)
->groupBy('year', 'month')
->orderBy('year', 'asc')
->orderBy('month', 'asc')
->get();

 
    
  
      return view('admin.statistics.index' , compact('orders'));
    }
  
  
}
