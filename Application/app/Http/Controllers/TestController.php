<?php

namespace App\Http\Controllers;

use App\Hr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function store(Request $request)
    {
        /*$search_term = $request->input('search');
        $hrs = Hr::searchHr($search_term)->get();
        $context = array(
          'hrs' => $hrs,
          'search_term' => $search_term,
        );
        return view('jasonsInvasion.search_result')->with($context);*/

        //$contents = Storage::disk('local')->download('public/lectures/lecture_files_21/django(1)_1520498804.pdf');

        //return $contents;
        dd($request->all());
    }
}
