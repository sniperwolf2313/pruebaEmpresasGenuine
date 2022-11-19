
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
                <h2 class="fw-bold text-center py-5"><h1>{{$modo}} Empresa</h1></h2>
            </div>
            <div class="form-group mb-4 text-start">
                <label  for="Nombre" class="form-label">Nombre De La Empresa</label>
                <input class="form-control" type="text" name="Nombre" id="Nombre" value="{{isset($empresa->Nombre)?$empresa->Nombre:old('Nombre')}}" required>
                <label  for="Correo" class="form-label">Correo Electronico</label>
                <input class="form-control" type="email" name="Correo" id="Correo" value="{{isset($empresa->Correo)?$empresa->Correo:old('Correo')}}">
                <label  for="PaginaWeb" class="form-label">Pagina Web</label>
                <input class="form-control" type="url" name="PaginaWeb" id="PaginaWeb" value="{{isset($empresa->PaginaWeb)?$empresa->PaginaWeb:'https://'}}" placeholder="https://example.com" pattern="https://.*"> <br>
                <label  for="Foto" class="form-label">Logo De La Empresa (.jpg, .jpeg, .png)</label>
                @if (isset($empresa->Foto))
                    <img src="{{asset('../storage/app').'/'.$empresa->Foto}}" width="100" height="100" alt="">
                @endif
                <input type="file" name="Foto" id="Foto" value=""> <br>
            </div>
            <div class="form-group d-grid">
                <input class="btn btn-primary" type="submit" value="{{$modo}} Empresa"> <br>
                <a class="btn btn-outline-primary" href="{{url('/empresas')}}">Regresar</a>
            </div>
        </div>
    </div>
</div>


