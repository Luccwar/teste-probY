@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Criar Novo Projeto</h2>

    @if (session('message'))
        <div class="alert {{ session('message_type') == 'success' ? 'alert-success' : 'alert-danger' }}">
            <strong>{{ session('message') }}</strong>
            <ul>
                @if(session('error_fields.name'))
                    <li><strong>Nome: </strong>{{ session('error_fields.name') }}</li>
                @endif
                @if(session('error_fields.start_date'))
                    <li><strong>Data de Início: </strong> {{ session('error_fields.start_date') }}</li>
                @endif
                @if(session('error_fields.status'))
                    <li><strong>Status: </strong> {{ session('error_fields.status') }}</li>
                @endif
            </ul>
        </div>
    @endif

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form action="{{ route('projects.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Projeto</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Escreva o nome do projeto" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição do Projeto (Opcional)</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Descreva o projeto">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Data de Início</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" required value="{{ old('start_date') }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Selecione o status</option>
                        <option value="Pendente" {{ old('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="Em Andamento" {{ old('status') == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                        <option value="Concluído" {{ old('status') == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-success">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
