<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

class ProjectController extends Controller
{
    public readonly Project $project;
    
    public function __construct()
    {
        $this->project = new Project();
    }

    public function index()
    {
        $projects = $this->project->paginate(6);
        return view('projects', ['projects' => $projects]);
    }

    public function create()
    {
        return view('project_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'status' => 'required|in:Pendente,Em Andamento,Concluído',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
                ->with('message', 'Erros no preenchimento do formulário:')
                ->with('message_type', 'error')
                ->with('error_fields', [
                    'name' => $errors->first('name'),
                    'description' => $errors->first('description'),
                    'start_date' => $errors->first('start_date'),
                    'status' => $errors->first('status'),
                ])
                ->withInput();
        }

        $created = $this->project->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'status' => $request->input('status'),
        ]);

        return $created
            ? redirect()->back()->with('message', 'Projeto criado com sucesso')->with('message_type', 'success')
            : redirect()->back()->with('message', 'Erro na criação do projeto, contate o suporte do site')->with('message_type', 'error');
    }


    public function show(Project $project)
    {
        return view('project_show', ['project' => $project]);
    }

    public function edit(Project $project)
    {
        return view('project_edit', ['project' => $project]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'status' => 'required|in:Pendente,Em Andamento,Concluído',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
                ->with('message', 'Erros no preenchimento do formulário:')
                ->with('message_type', 'error')
                ->with('error_fields', [
                    'name' => $errors->first('name'),
                    'description' => $errors->first('description'),
                    'start_date' => $errors->first('start_date'),
                    'status' => $errors->first('status'),
                ])
                ->withInput();
        }

        $updated = $this->project->where('id', $id)->update($request->except(['_token','_method']));

        return $updated
            ? redirect()->back()->with('message', 'Projeto atualizado com sucesso')->with('message_type', 'success')
            : redirect()->back()->with('message', 'Erro na atualização do projeto, contate o suporte do site')->with('message_type', 'error');
    }

    public function destroy(string $id)
    {
        $this->project->where('id', $id)->delete();

        return redirect()->route('projects.index');
    }
}
