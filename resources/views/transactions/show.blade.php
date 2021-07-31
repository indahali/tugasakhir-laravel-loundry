@extends('layouts.app')

@section('title', 'transaksi')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Tanggal Transaksi : {{ $transaction['tanggal_transaksi'] }}</h3>
                <h3>Nama customer : {{ $transaction['nama'] }}</h3>
                <h3>Email customer : {{ $transaction['email'] }}</h3>
                <h3>Alamat customer : {{ $transaction['alamat'] }}</h3>
                <h3>Berat Loundry : {{ $transaction['berat'] }}</h3>
                <h3>Keterangan : {{ $transaction['keterangan'] }}</h3>
    </div>
</div>
@endsection