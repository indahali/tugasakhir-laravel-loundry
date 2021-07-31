<?php

namespace App\Http\Controllers\Api;

use App\Models\transactions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transaksicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = transactions::all();

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data Transaksi',
            'data'       => $transactions 
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
            'tanggal_transaksi' => 'required|unique:transactions|max:255',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'berat' =>'required',
            'keterangan' => 'required',
        ]);

        $transactions = transactions::create([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat'=> $request->alamat,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
            
        ]);
            if ($transactions) {
                return response()->json([
                    'success' => true,
                    'message'    => 'Transaksi Berhasil di tambahkan',
                    'data'       => $transactions 
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'Transaksi Gagal Ditambahkan ',
                    'data'       => $transactions 
                ], 409); 
            }
    }
    public function show ($id)
    {
        $transactions = transactions::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data Transaksi ',
            'data'       => $transactions
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $transactions = transactions::find($id)->update([
                'nama' => $request->nama,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data Transaksi telah berhasil di rubah',
                'data'    => $transactions
            ], 200);
        }
        public function destroy($id)
        {
            $transactions = transactions::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data Transaksi berhasil di hapus',
                'data'    => $transactions
            ], 200);
        }
        
    }