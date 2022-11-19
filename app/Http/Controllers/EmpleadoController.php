<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listaEmpleados['empleados']=Empleado::paginate(10);
        return view('empleado.index', $listaEmpleados);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaEmpresas['empresasLista']=Empresa::all();
        return view('empleado.create',$listaEmpresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camposEmpleado=[
            'Nombre'=>'required|string|max:50',
            'PrimerApellido'=>'required|string|max:50',
            'SegundoApellido'=>'required|string|max:50',
            'Empresa'=>'required|string|max:50',
            'Correo'=>'required|email|max:50',
            'Telefono'=>'required',

        ];

        $mensaje=['required'=>'El campo :attribute es requerido'];

        $this->validate($request, $camposEmpleado, $mensaje);


        $datoEmpleado = request()->except('_token');
        Empleado::insert($datoEmpleado);
        return redirect('empleados')->with('mensaje','Empleado Agregado Con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado =Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $camposEmpleado=[
            'Nombre'=>'required|string|max:50',
            'PrimerApellido'=>'required|string|max:50',
            'SegundoApellido'=>'required|string|max:50',
            'Empresa'=>'required|string|max:50',
            'Correo'=>'required|email|max:50',
            'Telefono'=>'required',

        ];

        $mensaje=['required'=>'El campo :attribute es requerido'];

        $this->validate($request, $camposEmpleado, $mensaje);

        $datoEmpleado = request()->except(['_token','_method']);
        Empleado::where('id','=',$id)->update($datoEmpleado);


        $empleado =Empleado::findOrFail($id);
        return redirect('empleados')->with('mensaje','Empleado Modificado');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado =Empleado::findOrFail($id);
        Empleado::destroy($id);
        return redirect('empleados')->with('mensaje','Empleado Eliminado');
    }
}
