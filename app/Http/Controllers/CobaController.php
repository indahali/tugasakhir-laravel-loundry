<?php

namespace App\Http\Controllers;
use App\models\customers;

use Illuminate\Http\Request;

class cobacontroller extends controller
{
    
public function index()
{
    $customers = customers::OrderBy('id', 'desc')->paginate(3);

    return view('customers.index', compact('customers'));
}
public function create()
{
    return view('customers.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'nama' => 'required|unique:customers|max:255',
        'email' => 'required',
        'alamat' => 'required',

    ]);

    $customers = new customers;

    $customers->nama = $request->nama; 
    $customers->email = $request->email; 
    $customers->alamat = $request->alamat;

    $customers->save();

        return redirect('/customers');
    }

    public function show($id)
    {
        $customer = customers::where('id', $id)->first();
        return view('customers.show', ['customer' => $customer]);
    }

    public function edit($id)
    {
        $customer = customers::where('id', $id)->first();
        return view('customers.edit', ['customer' => $customer]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:customers|max:255',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        customers::find($id)-> update([

            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        return redirect('/customers');
    }
    public function destroy($id)
    {
        customers::find($id)->delete();
        return redirect('/customers');
    }
}