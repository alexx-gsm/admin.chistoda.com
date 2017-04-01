<?php

namespace App\Http\Controllers\Api;

use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    /**
     * Show the ADMIN dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = Price::orderby('id', 'desc')->first();
        return response()->json($price);

//        return response()->json($price);
    }
}
