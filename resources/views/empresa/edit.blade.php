@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/empresas/'.$empresa->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('empresa.form',['modo'=>'Editar'])
</form>
</div>
@endsection
