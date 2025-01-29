@extends('master')

@section('content')

<h2>Users</h2>

<a href="{{ route('users.create') }}">Create</a>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} | <a href="{{ route('users.show',['user' => $user->id]) }}">Mostrar</a> | <a href="{{ route('users.edit',['user' => $user->id]) }}">Editar</a></li>
    @endforeach
</ul>

@endsection