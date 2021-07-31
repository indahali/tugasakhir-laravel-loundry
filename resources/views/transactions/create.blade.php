@extends('layouts.app')

@section('title', 'transactions')

@section('content')

<form action="/transactions" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Transaksi</label>
    <input type="text" class="form-control" name="tanggal_transaksi" id="emailHelp" value="{{ old('tanggal_transaksi') }}">
    @error('tanggal_transaksi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="text" class="form-control" name="email" id="emailHelp" value="{{ old('email') }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Berat</label>
    <input type="text" class="form-control" name="berat" id="emailHelp" value="{{ old('berat') }}">
    @error('berat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Keterengan</label>
    <input type="text" class="form-control" name="keterangan" id="emailHelp" value="{{ old('keterangan') }}">
    @error('keterangan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>


@endsection