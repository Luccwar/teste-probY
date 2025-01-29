@extends('master')

@section('content')

<h2>Criar</h2>

@if (session()->has('message'))
    <p>{{ session('message') }}</p>
@endif

<form action="{{ route('users.store')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Escreva o nome" >
    <input type="email" name="email" placeholder="Escreva o email" >
    <input type="password" name="password" placeholder="Escreva a senha" >
    <button type="submit">Criar</button>
</form>

@endsection