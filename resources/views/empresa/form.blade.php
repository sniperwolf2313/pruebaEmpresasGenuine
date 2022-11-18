<h1>{{$modo}} Empresa</h1>
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
<input type="text" name="Nombre" id="Nombre" value="{{isset($empresa->Nombre)?$empresa->Nombre:''}}" required> <br>
<input type="email" name="Correo" id="Correo" value="{{isset($empresa->Correo)?$empresa->Correo:''}}"> <br>
<input type="url" name="PaginaWeb" id="PaginaWeb" value="{{isset($empresa->PaginaWeb)?$empresa->PaginaWeb:'https://'}}" placeholder="https://example.com" pattern="https://.*"> <br>
@if (isset($empresa->Foto))
    <img src="{{asset('../storage/app').'/'.$empresa->Foto}}" width="100" height="100" alt="">
@endif
<input type="file" name="Foto" id="Foto" value=""> <br>
<input type="submit" value="{{$modo}} Empresa"> <br>

<a href="{{url('/empresas')}}">Regresar</a>
