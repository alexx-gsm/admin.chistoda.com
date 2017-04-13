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
        return response()->json(Price::getActive());

    }

    public function getInactive()
    {
        return response()->json(Price::getInactive());
    }
}
