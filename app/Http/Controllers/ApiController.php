<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function edithrg(Request $request, $id)
    {
    	// return $request->all();
    	$barang = \App\Barang::find($id);
    	// $pelanggan->stock()->updateExistingPivot($request->pk,['jumlah_beli' => $request->value]);
    	$barang->update($request->all());
    }
}
