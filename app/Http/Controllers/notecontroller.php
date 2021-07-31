<?php

namespace App\Http\Controllers;
use App\models\notes;

use Illuminate\Http\Request;

class notecontroller extends controller
{
    
public function index()
{
    $notes = notes::OrderBy('id', 'desc')->paginate(3);

    return view('notes.index', compact('notes'));
}


public function create()
{
    return view('notes.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'description' => 'required|unique:notes|max:255',
        'status' => 'required',

    ]);

    $notes = new notes;

    $notes->description = $request->description; 
    $notes->status = $request->status; 

    $notes->save();

        return redirect('/notes');
    }

    public function show($id)
    {
        $note = notes::where('id', $id)->first();
        return view('notes.show', ['note' => $note]);
    }

    public function edit($id)
    {
        $note = notes::where('id', $id)->first();
        return view('notes.edit', ['note' => $note]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'status' => 'required|unique:notes|max:255',

        ]);

        notes::find($id)-> update([
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('/notes');
    }
    public function destroy($id)
    {
        notes::find($id)->delete();
        return redirect('/notes');
    }
}