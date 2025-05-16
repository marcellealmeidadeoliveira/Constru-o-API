<?php

namespace App\Http\Controllers;
use App\Models\tbremedio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class TbremedioController extends Controller
{
  
   
    public function index()
    {
        $registro = tbremedio::all();
        $contador = $registro->count();

        if($contador>0){
            return Response()->json([
                'Sucesso'=> true,
                'Mensagem'=> 'Medicamentos encontrados :D',
                'data'=> $registro,
                'Total'=>$contador
            ], 200);
        }
else{
    return Response()->json([
        'Sucesso'=>false,
        'Mnesagem'=>'Ops, houve um erro ao procurar os medicamentos, tente novamente :c',
    ],404);}}


    public function store(Request $request)
    {
        $validacao= Validator::make($request->all(),[
            'nome'=>'required',
            'indicacao'=>'required',
            'codigoDeBarras'=>'required',
            'peso'=>'required',
            'NecessarioReceita?'=>'required'
        ]);
        if($validacao->fails()){
            return response()->json([
                'Sucesso'=> false,
                'Mensagem'=>'Erro, registro de medicamento invalido:c',
                'erros'=>$validacao->errors()
            ],400);
        }
        $registro = tbremedio::create($request->all());
        if($registro){
            return response()->json([
            'Sucesso'=> true,
            'Mensagem'=>'Medicamento cadastrado com sucesso:D',
            'data'=>$registro ],201);
        }
        else {
            return response()->json([
                'Sucesso'=> false,
                'Mensagem'=> 'Erro ao cadastrar medicamento :c',
                'data'=>$registro
            ],500);
        }
    }


    public function show($id)
    {
$registro=tbremedio::find($id);

if($registro){

    return response()->json([

        'Sucesso'=> true,

        'Mensagem'=> 'Medicamento encontrado :D',

        'data'=> $registro

    ],200);

    } else {

        return response()->json([

            'Sucesso'=>false,

            'Mensagem'=>'Medicamento não encontrado.',

        ],404);
    }

    }


    public function update(Request $request, string $id)
    {

 $validacao=Validator::make($request->all(),[
        'nome'=>'required',
            'indicacao'=>'required',
            'codigoDeBarras'=>'required',
            'peso'=>'required',
            'NecessarioReceita?'=>'required'
 ]);
 if ($validacao -> fails()){
    return response()->json([
        'Sucesso'=>false,
        'Mensagem'=> 'Registro de medicamentos invalidos',
        'Errors'=>$validacao->errors
    ],400);
 }

 $Rbanco=tbremedio::find($id);

        if(!rBanco){
            return response()->json([
                'Sucesso'=> false,
                'Mensagem'=>'Medicamento não encontrado :C',
            ],404);
        }
    $Rbanco->nome=$request->nome;
     $Rbanco->indicacao=$request->indicacao;
    $Rbanco->codigoDeBarras=$request->codigoDeBarras;
    $Rbanco->peso=$request->peso;
    $Rbanco->NecessarioReceita=$request->NecessarioReceita;
    }
    if ($Rbanco->save()){
        return response()->json([
            'Sucesso'=>true,
            'Mensagem'=>'Dados do medicamento atualizado :D',
            'data'=>$Rbanco
        ],200);
    } else{
        return response()->json([
            'Sucesso'=>false,
            'Mensagem'=>'Erro ao atualizar dados do medicamento'
        ],500);
    }
    

  
    public function destroy( $id)
    {
        $registro=tbremedio::find($id);
$registro= tbremedio::find($id);
if(!$registro){
    return response()->json([
        'Sucesso'=>false,
        'Mensagem'=>'Medicamento não encontrado :C'
    ],404);
}
if($registro->delete()){
    return response()->json([
        'Sucesso'=>true,
        'Mensagem'=>'Medicamento deletado com sucesso :D'
    ],200);
}
return response()->json([
    'Sucesso'=> false,
    'Mensagem'=>'Error ao deletar medicamento :C',
],500);
    }
}
