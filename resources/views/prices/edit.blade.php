@extends('layouts.app')

@section('title', 'prices')

@section('content')

<form action="/prices/{{ $price['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namabarang" aria-describedby="emailHelp" value="{{ old('namabarang') ? old('namabarang') : $price['namabarang'] }}">
    @error('namabarang')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Satuan</label>
    <input type="text" class="form-control" name="satuan" id="emailHelp" value="{{ old('satuan') ? old('satuan') : $price['satuan'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1" value="{{ old('harga') ? old('harga') : $price['harga'] }}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection