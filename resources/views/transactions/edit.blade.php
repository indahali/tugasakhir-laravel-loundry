@extends('layouts.app')

@section('title', 'transactions')

@section('content')

<form action="/transactions/{{ $transaction['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Tanggal Transaksi</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="tanggal_transaksi" aria-describedby="emailHelp" value="{{ old('tanggal_transaksi') ? old('tanggal_transaksi') : $transaction['tanggal_transaksi'] }}">
    @error('tanggal_transaksi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') ? old('nama') : $transaction['nama'] }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="text" class="form-control" name="email" id="emailHelp" value="{{ old('email') ? old('email') : $transaction['email'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') ? old('alamat') : $transaction['alamat'] }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Berat</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="berat" aria-describedby="emailHelp" value="{{ old('berat') ? old('berat') : $transaction['berat'] }}">
    @error('berat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="keterangan" aria-describedby="emailHelp" value="{{ old('keterangan') ? old('keterangan') : $transaction['keterangan'] }}">
    @error('keterangan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection