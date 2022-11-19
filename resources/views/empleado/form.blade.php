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

<div class="container w-75 bg-primary mt-5 rounded shadow">

    <div class="row align-items-stretch">

        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"></div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-center">
                <h2 class="fw-bold text-center py-5">{{$modo}} Empleado</h2>
            </div>
            <div class="form-group mb-4 text-start">
                <label  for="Nombres" class="form-label">Nombres</label>
                <input class="form-control" type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" required>
                <label  for="PrimerApellido" class="form-label">Primer Apellido</label>
                <input class="form-control"  type="text" name="PrimerApellido" id="PrimerApellido" value="{{isset($empleado->Nombre)?$empleado->PrimerApellido:old('PrimerApellido')}}" required>
                <label  for="SegundoApellido" class="form-label">Segundo Apellido</label>
                <input class="form-control" type="text" name="SegundoApellido" id="SegundoApellido" value="{{isset($empleado->Nombre)?$empleado->SegundoApellido:old('SegundoApellido')}}" required>
                <label  for="Empresa" class="form-label">Seleccione La Empresa Donde Trabaja</label>
                <select class="form-control" name="Empresa" id="Empresa">
                    @foreach ($empresasLista as $empresa)
                        <option>{{$empresa->Nombre}}</option>
                    @endforeach
                </select>
                <label  for="Correo" class="form-label">Correo Electronico</label>
                <input class="form-control" type="email" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}">
                <label  for="Telefono" class="form-label">Telefono</label>
                <input class="form-control" type="number" name="Telefono" id="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:old('Telefono')}}" required> <br>
            </div>

            <div class="form-group d-grid">
            <input class="btn btn-primary" type="submit" value="{{$modo}} Empleado"> <br>
            <a class="btn btn-outline-primary" href="{{url('/empleados')}}">Regresar</a>
            </div>
        </div>
    </div>
</div>



