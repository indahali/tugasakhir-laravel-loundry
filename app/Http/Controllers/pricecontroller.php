<?php

namespace App\Http\Controllers;
use App\models\prices;

use Illuminate\Http\Request;

class pricecontroller extends controller
{
    
public function index()
{
    $prices = prices::OrderBy('id', 'desc')->paginate(3);

    return view('prices.index', compact('prices'));
}
public function create()
{
    return view('prices.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'namabarang' => 'required|unique:prices|max:255',
        'satuan' => 'required',
        'harga' => 'required',

    ]);

    $prices = new prices;

    $prices->namabarang = $request->namabarang; 
    $prices->satuan = $request->satuan; 
    $prices->harga = $request->harga;

    $prices->save();

        return redirect('/prices');
    }

    public function show($id)
    {
        $prices = prices::where('id', $id)->first();
        return view('prices.show', ['price' => $price]);
    }

    public function edit($id)
    {
        $price = prices::where('id', $id)->first();
        return view('prices.edit', ['price' => $price]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'namabarang' => 'required|unique:prices|max:255',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        prices::find($id)-> update([

            'namabarang' => $request->namabarang,
            'satuan' => $request->satuan,
            'harga' => $request->harga
        ]);

        return redirect('/prices');
    }
    public function destroy($id)
    {
        prices::find($id)->delete();
        return redirect('/prices');
    }
}