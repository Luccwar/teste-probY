@extends('master')

@section('content')

<div class="mt-5">
    <h2 class="text-center mb-4">Listagem de Projetos</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Criar novo projeto</a>
    </div>

    @if($projects->count())
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Início</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-secondary btn-sm">Inspecionar</a>
                            <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-success btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    @else
        <p class="text-center">Nenhum projeto encontrado.</p>
    @endif
</div>

@endsection
