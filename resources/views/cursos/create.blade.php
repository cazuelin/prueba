@extends('layouts.plantilla')
@section('title', 'Cursos create')
@section('content')
<h1>en esta pagina podras crear un curso</h1>
<a href="{{route('cursos.index')}}">Volver a cursos</a>
    <form action="{{route('cursos.store')}}" method="POST">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Descripcion:
            <br>
           <textarea name="descripcion" id="" rows="5">{{old('descripcion')}}</textarea>
        </label>
        @error('descripcion')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="categoria" value="{{old('categoria')}}">
        </label>
        @error('categoria')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Enviar formulario</button>
    </form>
@endsection

