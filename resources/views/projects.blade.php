@extends('master')

@section('content')

<div class="mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Listagem de Projetos</h2>
        <a href="{{ route('projects.create') }}" class="btn btn-primary ms-auto">Criar novo projeto</a>
    </div>

    @if(session('message'))
        <div class="alert {{ session('message_type') == 'success' ? 'alert-success' : 'alert-danger' }}">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

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
