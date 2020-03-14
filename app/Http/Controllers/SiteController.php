<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
    	$data_stock = \App\Stock::paginate(8);

    	return view ('sites.home', ['data_stock' => $data_stock]);
    }

    public function about()
    {
    	return view ('sites.about');
    }

     public function daftar()
    {
    	return view ('sites.daftar');
    }
}
