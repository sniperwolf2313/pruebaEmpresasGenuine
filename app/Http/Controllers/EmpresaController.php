<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaEmpresas['empresas']=Empresa::paginate(10);
        return view('empresa.index', $listaEmpresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datoEmpresa = request()->except('_token');
        if($request->hasFile('Foto')){
            $datoEmpresa['Foto']=$request->file('Foto')->store('public');
        }
        Empresa::insert($datoEmpresa);
        return response()->json($datoEmpresa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa =Empresa::findOrFail($id);
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $datoEmpresa = request()->except(['_token','_method']);
        Empresa::where('id','=',$id)->update($datoEmpresa);

        if($request->hasFile('Foto')){
            $empresa =Empresa::findOrFail($id);
            Storage::delete('public/'.$empresa->Foto);
            $datoEmpresa['Foto']=$request->file('Foto')->store('public');
        }

        $empresa =Empresa::findOrFail($id);
        return view('empresa.edit', compact('empresa'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa =Empresa::findOrFail($id);
        if(Storage::delete('public/'.$empresa->Foto)){
            Empresa::destroy($id);
        }
        return redirect ('empresas');
    }
}
