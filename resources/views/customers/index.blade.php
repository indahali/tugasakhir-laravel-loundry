@extends('layouts.app')

@section('title', 'customers')

@section('content')
<a href="/customers/create" class="card-link btn-primary">Tambah customers</a>
@foreach ($customers as $customer)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/customers/{{ $customer['id'] }}" class="card-title">{{ $customer['nama'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $customer['email'] }}</h6>
    <p class="card-text">{{ $customer['alamat'] }}</p>
    <a href="/customers/{{$customer['id']}}/edit" class="card-link btn-warning">Edit Customer</a>
    <form action="/customers/{{ $customer['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete Customer</a>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $customers->links()}} 
</div>
@endsection