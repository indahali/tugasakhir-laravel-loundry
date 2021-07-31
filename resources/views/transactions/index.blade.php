@extends('layouts.app')

@section('title', 'transactions')

@section('content')
<a href="/transactions/create" class="card-link btn-primary">Tambah transaksi</a>
@foreach ($transactions as $transaction)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/transactions/{{ $transaction['id'] }}" class="card-title">{{ $transaction['tanggal_transaksi'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $transaction['nama'] }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{ $transaction['email'] }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{ $transaction['alamat'] }}</h6>
    <p class="card-text">{{ $transaction['berat'] }}</p>
    <p class="card-text">{{ $transaction['keterangan'] }}</p>

    <a href="/transactions/{{$transaction['id']}}/edit" class="card-link btn-warning">Edit Transaksi</a>
<form action="/transactions/{{ $transaction['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete Transaksi</a>
    </form>
  </div>
</div>

@endforeach

<div>
{{ $transactions->links()}} 
</div>
@endsection