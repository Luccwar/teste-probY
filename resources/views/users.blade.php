@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Listagem de Usuários</h2>

    @if(session('message'))
        <div class="alert {{ session('message_type') == 'success' ? 'alert-success' : 'alert-danger' }}">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Criar novo usuário</a>
    </div>

    @if($users->count())
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-secondary btn-sm">Inspecionar</a>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    @else
        <p class="text-center">Não existem usuários cadastrados.</p>
    @endif
</div>

@endsection
