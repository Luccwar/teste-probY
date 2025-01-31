@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Editar Usuário</h2>

    @if (session('message'))
        <div class="alert {{ session('message_type') == 'success' ? 'alert-success' : 'alert-danger' }}">
            <strong>{{ session('message') }}</strong>
            <ul>
                @if(session('error_fields.name'))
                    <li><strong>Nome: </strong>{{ session('error_fields.name') }}</li>
                @endif
                @if(session('error_fields.email'))
                    <li><strong>Email: </strong> {{ session('error_fields.email') }}</li>
                @endif
                @if(session('error_fields.password'))
                    <li><strong>Senha: </strong> {{ session('error_fields.password') }}</li>
                @endif
            </ul>
        </div>
    @endif

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" value="" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-warning">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
