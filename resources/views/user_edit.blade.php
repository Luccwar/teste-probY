@extends('master')

@section('content')

<h2>Edit</h2>

@if (session()->has('message'))
    <p>{{ session('message') }}</p>
@endif

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT" >
    <input type="text" name="name" value="{{ $user->name }}" >
    <input type="email" name="email" value="{{ $user->email }}" >
    <input type="password" name="password" value="{{ $user->password }}" >
    <button type="submit">Editar</button>
</form>

@endsection