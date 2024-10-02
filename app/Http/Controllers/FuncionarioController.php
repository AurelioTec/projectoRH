<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class FuncionarioController extends Controller
{
    //função resouce que traz os dados do banco
    public function index()
    {
        //trazer todos os dados do banco de dados
        $funcio = Funcionario::all();
        return view('page.funcionario', compact('funcio'));
    }

    //função para inserir e atualizar dados do banco.
    public function store(Request $request)
    {
        $funcio = null;
        if (isset($request->id)) {
            //procurar um elemento no banco de dados usar o find
            $funcio = Funcionario::find($request->id);
            $user = User::find($funcio->users_id);
            $user->name = $request->nome;
            $user->email = $request->email;
            $user->save();
        } else {
            $user = new User();
            $user->name = $request->nome;
            $user->email = $request->email;
            $user->password = bcrypt('1234funcionario');
            $user->tipousuario = "Funcionario";
            $user->save();
            $funcio = new Funcionario();
            $funcio->users_id = $user->id;
        }
        if (isset($request->imagem)) {
            $imagem = $request->imagem;
            $extencao = $imagem->extension();
            $imgNome = md5($imagem->getClientOriginalName() . strtotime('now')) . $extencao;
            $imagem->move(public_path('img/carregadas'), $imgNome);
            $funcio->imagem = $imgNome;
        }
        $funcio->nagente = $request->nagente;
        $funcio->nomecompleto = $request->nome;
        $funcio->cargo = $request->cargo;
        $funcio->categoria = $request->categoria;
        $funcio->save();
        if ($funcio) {
            if (isset($request->id))
                return redirect()->back()->with('Sucesso', 'Funcionario atualizado com sucesso');
            else
                return redirect()->back()->with('Sucesso', 'Funcionario adicionado com sucesso');
        } else {
            return redirect()->back()->with('Error', 'Erro ao cadastrar o funcionario');
        }
    }

    //função para deletar
    public function deletar($id)
    {
        Funcionario::find($id)->delete();
        return redirect()->back();
    }
}
