<?php

namespace App\Http\Controllers;

use App\Models\Recrutamento;
use Illuminate\Http\Request;

class RecrutamentoController extends Controller
{
    //função resouce que traz os dados do banco
    public function index()
    {
        //trazer todos os dados do banco de dados
        $recruta = Recrutamento::all();
        return view('page.recrutamento', compact('recruta'));
    }

    //função para inserir e atualizar dados do banco.
    public function store(Request $request)
    {
        $recruta = null;
        if (isset($request->id)) {
            //procurar um elemento no banco de dados usar o find
            $recruta = Recrutamento::find($request->id);
        } else {
            $recruta = new Recrutamento();
        }

        $recruta->nome = $request->nome;
        $recruta->datanascimento = $request->datanasc;
        $recruta->genero = $request->genero;
        $recruta->nbi = $request->nbi;
        $recruta->categoria = $request->categoria;
        $recruta->telefone = $request->telefone;
        $recruta->email = $request->email;
        $recruta->save();
        if ($recruta) {
            if (isset($request->id))
                return redirect()->back()->with('Sucesso', 'Recrutamento atualizado com sucesso');
            else
                return redirect()->back()->with('Sucesso', 'Recrutamento adicionado com sucesso');
        } else {
            return redirect()->back()->with('Error', 'Erro ao cadastrar o Recrutamento');
        }
    }

    //função para deletar
    public function deletar($id)
    {
        Recrutamento::find($id)->delete();
        return redirect()->back();
    }
}
