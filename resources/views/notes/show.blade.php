@extends('layouts.app')

@section('title', 'note')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>description : {{ $note['description'] }}</h3>
                <h3>status : {{ $note['status'] }}</h3>

</div>
@endsection