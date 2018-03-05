<?php

namespace App\Http\Controllers;

use App\Hr;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('search');
        $hrs = Hr::searchHr($search_term)->get();
        $context = array(
          'hrs' => $hrs,
          'search_term' => $search_term,
        );
        return view('jasonsInvasion.search_result')->with($context);
    }
}
