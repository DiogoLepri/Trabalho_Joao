<?php

namespace App\Http\Controllers;

use App\Models\TarefasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarefasController extends Controller
{
    public function index(){
        $projetos = TarefasModel::all();
        return response()->json($projetos);
    }

    public function show($id){
        $projetos = TarefasModel::findOrFail($id);
        return response()->json($projetos);
    }

    public function store(Request $request){
        $autenticador = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:sim,nao',

        ]);

        if ($autenticador->fails()) {
            return response()->json(['errors' => $autenticador->errors()], 422);
        }

        $tarefa = TarefasModel::create($request->all());
        return response()->json($tarefa, 201);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:sim,nao',
        ]);
        
        if($autenticador->fails()) {
            return response()->json(['errors' => $autenticador->errors()], 422);
        }

        $tarefa = TarefasModel::findOrFail($id);
        $tarefa->update($request->all());
        return response()->json($tarefa);
    }
    
    public function destroy($id){
        $tarefa = TarefasModel::findOrFail($id);
        $tarefa->delete();
        return response()->json(null, 204);
    }
}  
    

