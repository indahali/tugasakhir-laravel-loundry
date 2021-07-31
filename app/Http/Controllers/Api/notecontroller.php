<?php

namespace App\Http\Controllers\Api;

use App\Models\notes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class notecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = notes::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data note teman',
            'data'       => $notes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $request->validate([
            'id' => 'required|unique:transactions|max:255',
            'description' => 'required',
            'status' =>'required',
        ]);

        $notes = notes::create([
            'id' => $request->id,
            'description'=> $request->description,
            'status' => $request->status,
            
        ]);
            if ($notes) {
                return response()->json([
                    'success' => true,
                    'message'    => 'note Berhasil di tambahkan',
                    'data'       => $notes
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'note Gagal Ditambahkan ',
                    'data'       => $notes
                ], 409); 
            }
    }
    public function show ($id)
    {
        $note = notes::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data note ',
            'data'       => $note
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $note = notes::find($id)->update([
                'id' => $request->id,
                'description' => $request->description,
                'status' => $request->status
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data note telah berhasil di rubah',
                'data'    => $note
            ], 200);
        }
        public function destroy($id)
        {
            $note = notes::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data note berhasil di hapus',
                'data'    => $note
            ], 200);
        }
        
    }