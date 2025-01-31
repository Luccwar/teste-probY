@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Criar Novo Usuário</h2>

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
            <form action="{{ route('users.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Escreva o nome" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Escreva o email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Escreva a senha" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-success">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
