@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
        </div>
    @endif





    <a href="{{url('/empleados/create')}}">Registrar Nuevo Empleado</a>

    <table class="table table -light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Empresa</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->PrimerApellido}}</td>
                <td>{{$empleado->SegundoApellido}}</td>
                <td>{{$empleado->Empresa}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>{{$empleado->Telefono}}</td>
                <td>
                    <a href="{{url('/empleados/'.$empresa->id.'/edit')}}">Editar</a>

                    <form action="{{url('/empleados/'.$empresa->id)}}" method="post">
                        @csrf
                        {{method_field ('DELETE')}}
                        <input type="submit" onclick="return confirm('Quieres borrar este empleado?')" value="Borrar">
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    {!!$empresas->links() !!}
</div>
@endsection
