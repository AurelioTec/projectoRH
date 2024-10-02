<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\User;

class UserController extends Controller
{
    //função resouce que traz os dados do banco
    public function index()
    {
        //trazer todos os dados do banco de dados
        $user = User::all();
        return view('page.usuario', compact('user'));
    }

    //função para inserir e atualizar dados do banco.
    public function store(userRequest $request)
    {
        $user = null;
        if (isset($request->id)) {
            //procurar um elemento no banco de dados usar o find
            $user = User::find($request->id);
        }else{
            $user= new User();
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt('1234funcionario');
        $user->tipousuario =$request->tipousuario;
        $user->save();
        return redirect()->back();
    }

    //função para deletar
    public function deletar($id){
      User::find($id)->delete();
        return redirect()->back();
    }
}
