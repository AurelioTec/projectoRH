<?php

namespace App\Http\Controllers;

use App\Models\Ferias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeriasController extends Controller
{
    public function index()
    {
        //trazer todos os dados do banco de dados
        $ferias = Ferias::all();
        return view('page.ferias', compact('ferias'));
    }
    //função para inserir e atualizar dados do banco.
    public function store(Request $request)
    {
        $feria = null;
        if (isset($request->id)) {
            //procurar um elemento no banco de dados usar o find
            $feria = Ferias::find($request->id);
        } else {

            $feria = new Ferias();
        }
        $feria->funcionarios_id = $request->funcioid;
        $feria->datainicio = $request->datainicio;
        $feria->datafim = $request->datafim;
        $feria->aprovadopor = Auth::user()->name;
        $feria->estado = "Pendente";
        $feria->save();
        if ($feria) {
            if (isset($request->id))
                return redirect()->back()->with('Sucesso', 'Férias atualizado com sucesso');
            else
                return redirect()->back()->with('Sucesso', 'Férias cadastrada com sucesso');
        } else {
            return redirect()->back()->with('Error', 'Erro ao cadastrar as férias do ' . Ferias::find($request->funcioid)->nomecompleto);
        }
    }

    //função para deletar
    public function deletar($id)
    {
        Ferias::find($id)->delete();
        return redirect()->back();
    }

    public function aprovar($id)
    {
        $ferias = Ferias::find($id);
        $ferias->estado = "Aprovado";
        $ferias->save();
        return redirect()->back();
    }
    public function recusar($id)
    {
        $ferias = Ferias::find($id);
        $ferias->estado = "Recusado";
        $ferias->save();
        return redirect()->back();
    }
}
