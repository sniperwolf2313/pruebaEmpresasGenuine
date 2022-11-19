@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
        </div>
    @endif
    <a class="btn btn-outline-success" href="{{url('/empresas/create')}}">Registrar Empresa</a>
    <br><br>

    <table class="table table -light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre Empresa</th>
                <th>Correo Electronico</th>
                <th>Pagina Web</th>
                <th>Logo</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
            <tr>
                <td>{{$empresa->id}}</td>
                <td>{{$empresa->Nombre}}</td>
                <td>{{$empresa->Correo}}</td>
                <td>{{$empresa->PaginaWeb}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('../storage/app').'/'.$empresa->Foto}}" width="100" height="100" alt=""></td>
                <td>
                    <a class="btn btn-outline-warning" href="{{url('/empresas/'.$empresa->id.'/edit')}}">Editar</a>

                    <form class='d-inline' action="{{url('/empresas/'.$empresa->id)}}" method="post">
                        @csrf
                        {{method_field ('DELETE')}}
                        <input class="btn btn-outline-danger" type="submit" onclick="return confirm('Quieres borrar esta empresa?')" value="Borrar">
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    {!!$empresas->links() !!}
</div>
@endsection
