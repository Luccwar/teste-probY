@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Detalhes do Projeto</h2>

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title">Informações do Projeto</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>ID:</strong> {{ $project->id }}</li>
                <li class="list-group-item"><strong>Nome:</strong> {{ $project->name }}</li>
                <li class="list-group-item"><strong>Descrição:</strong> {{ $project->description ?? 'Nenhuma descrição fornecida' }}</li>
                <li class="list-group-item"><strong>Data de Início:</strong> {{ $project->start_date->format('Y-m-d') }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ $project->status }}</li>
            </ul>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm">Voltar</a>

                <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
