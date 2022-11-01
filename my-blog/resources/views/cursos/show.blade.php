@extends('layouts.plantilla')

@section('title','Curso '. $curso)

@section('content')
    <h1>Bienvenido a curso  {{$curso->name}}</h1>
    <a href="{{route('cursos.index')}}">Volver a cursos</a>
    <p><strong>Categoria:</strong>{{$curso->categoria}}</p>
    <p>{{$curso->descripcion}}</p>
@endsection