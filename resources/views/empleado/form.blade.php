<h1>{{$modo}} Empleado</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif
<input type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" required> <br>
<input type="text" name="PrimerApellido" id="PrimerApellido" value="{{isset($empleado->Nombre)?$empleado->PrimerApellido:old('PrimerApellido')}}" required> <br>
<input type="text" name="SegundoApellido" id="SegundoApellido" value="{{isset($empleado->Nombre)?$empleado->SegundoApellido:old('SegundoApellido')}}" required> <br>
<select name="Empresa" id="Empresa">
    @foreach ($empresas as $empresa)
    <option>{{$empresa->Nombre}}</option>
    @endforeach
</select><br>
<input type="email" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}"> <br>
<input type="number" name="Telefono" id="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:old('Telefono')}}" required> <br>
<input type="submit" value="{{$modo}} Empleados"> <br>

<a href="{{url('/empleados')}}">Regresar</a>
