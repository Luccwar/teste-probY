@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Detalhes do Usuário</h2>

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title">Informações do Usuário</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
                <li class="list-group-item"><strong>Nome:</strong> {{ $user->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Password (Hash):</strong> {{ $user->password }}</li>
            </ul>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm ">Voltar</a>

                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm ">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
