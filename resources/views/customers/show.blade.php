@extends('layouts.app')

@section('title', 'customer')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Nama customer : {{ $customer['nama'] }}</h3>
                <h3>Email customer : {{ $customer['email'] }}</h3>
                <h3>Alamat customer : {{ $customer['alamat'] }}</h3>
    </div>
</div>
@endsection