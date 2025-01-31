@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Seja Bem Vindo!</h2>

    @if(session('message'))
        <div class="alert {{ session('message_type') == 'success' ? 'alert-success' : 'alert-danger' }}">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
