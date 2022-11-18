

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif



<a href="{{url('/empresas/create')}}">Registrar Empresa</a>

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
            <td><img src="{{asset('../storage/app').'/'.$empresa->Foto}}" width="100" alt=""></td>
            <td>
                <a href="{{url('/empresas/'.$empresa->id.'/edit')}}">Editar</a>

                <form action="{{url('/empresas/'.$empresa->id)}}" method="post">
                    @csrf
                    {{method_field ('DELETE')}}
                    <input type="submit" onclick="return confirm('Quieres borrar esta empresa?')" value="Borrar">
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>

</table>
