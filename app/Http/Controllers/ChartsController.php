<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\categoryChart;
class ChartsController extends Controller
{
 	public function index(){
 		$chart = new categoryChart;
 		$chart->dataset('Pie', 'pie', [25,10,10])->options(['backgroundColor' => ['red','green','yellow']]);
 		
 		return view('chart_view', ['chart' => $chart]);
 	}
}
