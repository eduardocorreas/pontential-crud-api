<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if(count($request->all()) === 0){
                $developers = Developer::all();
                return response()->json($developers, 200);
            }else{
                $developers = collect([]);

                if(isset($request->nome)){
                    $developers = Developer::where('nome','LIKE', '%'.$request->nome.'%');
                }else if(isset($request->idade)){
                    $developers = Developer::where('idade',$request->idade);
                }else if(isset($request->sexo)){
                    $developers = Developer::where('sexo',$request->sexo);
                }else if(isset($request->hobby)){
                    $developers = Developer::where('hobby',$request->hobby);
                }else if(isset($request->datanascimento)){
                    $developers = Developer::where('datanascimento',$request->datanascimento);
                }

                return response()->json($developers->paginate(10), 200);
            }

        } catch (\Throwable $th) {
            return response()->json(['message'=>'Erro ao buscar desenvolvedores'], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            Developer::create([
                'nome'=> $request->nome,
                'sexo'=> $request->sexo,
                'idade'=> $request->idade,
                'hobby'=> $request->hobby,
                'datanascimento'=> $request->datanascimento,
            ]);

            return response()->json(['message'=>'Desenvolvedor cadastrado com sucesso'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message'=>'Erro ao cadastrar desenvolvedor'], 400);
            return response()->json($th);
        }
    }

    public function show($id)
    {
        try {
            $developer = Developer::find($id);
            if(isset($developer)){
                return response()->json($developer, 200);
            }else{
                return response()->json(['message'=>'Nenhum desenvolvedor encontrado'], 404);
            }

        } catch (\Throwable $th) {
            return response()->json(['message'=>'Erro ao retornar desenvolvedor'], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $developer = Developer::find($request->id);

            $developer->fill($request->all());
            $developer->save();

            return response()->json(['message'=>'Desenvolvedor atualizado com sucesso'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Erro ao atualizar dados do desenvolvedor'], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $developer = Developer::find($id);
            $developer->delete();
            return response()->json(['message'=>'Desenvolvedor excluído com sucesso'], 204);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Erro ao excluir o desenvolvedor'], 400);
        }
    }
}
