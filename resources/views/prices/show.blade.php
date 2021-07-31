@extends('layouts.app')

@section('title', 'price')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Nama Barang : {{ $price['namabarang'] }}</h3>
                <h3>Satuan : {{ $price['satuan'] }}</h3>
                <h3>Harga Barang : {{ $price['harga'] }}</h3>
    </div>
</div>
@endsection