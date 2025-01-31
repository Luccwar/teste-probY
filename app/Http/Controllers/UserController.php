<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public readonly User $user;
    public function __construct(){
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->paginate(6);
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|min:2|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:4|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
                ->with('message', 'Erros no preenchimento do formulário:')
                ->with('message_type', 'error')
                ->with('error_fields', [
                    'name' => $errors->first('name'),
                    'email' => $errors->first('email'),
                    'password' => $errors->first('password'),
                ])
                ->withInput();
        }

        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        return $created 
        ? redirect()->back()->with('message', 'Novo usuário criado com sucesso')->with('message_type', 'success')
        : redirect()->back()->with('message', 'Erro na criação de usuário, contate o suporte do site')->with('message_type', 'error');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|min:2|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:4|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
                ->with('message', 'Erros no preenchimento do formulário:')
                ->with('message_type', 'error')
                ->with('error_fields', [
                    'name' => $errors->first('name'),
                    'email' => $errors->first('email'),
                    'password' => $errors->first('password'),
                ])
                ->withInput();
        }

        $updated = $this->user->where('id', $id)->update($request->except(['_token','_method']));

        return $updated
        ? redirect()->back()->with('message', 'Usuário atualizado com sucesso')->with('message_type', 'success')
        : redirect()->back()->with('message', 'Erro na atualização do usuário, contate o suporte do site.')->with('message_type', 'error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Por mais que o erro "Undefined method 'user'" possa aparecer para você, o código funciona como o esperado
        if (auth()->user()->id == $id) {
            return redirect()->back()->with('message', 'Não é possível excluir o usuário logado no sistema.')->with('message_type', 'error');
        }

        $this->user->where('id', $id)->delete();

        return redirect()->route('users.index');
    }
}
