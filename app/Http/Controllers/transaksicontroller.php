<?php

namespace App\Http\Controllers;
use App\models\transactions;

use Illuminate\Http\Request;

class transaksicontroller extends controller
{
    
public function index()
{
    $transactions = transactions::OrderBy('id', 'desc')->paginate(2);

    return view('transactions.index', compact('transactions'));
}
public function create()
{
    return view('transactions.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'tanggal_transaksi' => 'required|unique:transactions|max:255',
        'nama' => 'required',
        'email' => 'required',
        'alamat' => 'required',
        'berat' => 'required',
        'keterangan' => 'required',

    ]);

    $transactions = new transactions;

    $transactions->tanggal_transaksi = $request->tanggal_transaksi; 
    $transactions->nama = $request->nama; 
    $transactions->email = $request->email; 
    $transactions->alamat = $request->alamat;
    $transactions->berat = $request->berat;
    $transactions->keterangan = $request->keterangan;

    $transactions->save();

            return redirect('/transactions');
    }

    public function show($id)
    {
        $transaction = transactions::where('id', $id)->first();
        return view('transactions.show', ['transaction' => $transaction]);
    }

    public function edit($id)
    {
        $transaction = transactions::where('id', $id)->first();
        return view('transactions.edit', ['transaction' => $transaction]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal_transaksi' => 'required|unique:transactions|max:255',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'berat' => 'required',
            'keterangan' => 'required',
    
        ]);
        transactions::find($id)-> update([

            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/transactions');
    }
    public function destroy($id)
    {
        transactions::find($id)->delete();
        return redirect('/transactions');
    }
    public function print($transactions)
    {
        transactions::find($transactions)->print();
        return redirect('/transactions');
    }
}