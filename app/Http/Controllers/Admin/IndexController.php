<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Show the ADMIN dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'price' => Price::orderby('id', 'desc')->first()
        ]);
    }
}
