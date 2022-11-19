@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/empleados/'.$empleado->id)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('empleado.form',['modo'=>'Editar'])
</form>
</div>
@endsection
