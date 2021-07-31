@extends('layouts.app')

@section('title', 'prices')

@section('content')
<a href="/prices/create" class="card-link btn-primary">Tambah List Harga</a>
@foreach ($prices as $price)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/prices/{{ $price['id'] }}" class="card-title">{{ $price['namabarang'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $price['satuan'] }}</h6>
    <p class="card-text">{{ $price['harga'] }}</p>
    <a href="/prices/{{$price['id']}}/edit" class="card-link btn-warning">Edit List Harga</a>
    <form action="/prices/{{ $price['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete List Harga</a>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $prices->links()}} 
</div>
@endsection