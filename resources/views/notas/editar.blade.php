@extends('plantilla')

@section('seccion')

<h1>Editar nota {{ $nota->id }} </h1>

@if (session('mensaje'))
  <div class="alert alert-success">
    {{ session('mensaje') }}
  </div>    
@endif


<form action="{{ route('notas.update', $nota->id) }}" method="POST">
    
    @method('PUT') {{-- Esto sirve para usar el metodo put que html no puede  --}}

    @csrf

    @error('nombre')
        <div class="alert alert-danger">
          El nombre es obligatorio
        
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
          
        </div>
        
        
        @enderror
        
        @error('descripcion')
        <div class="alert alert-danger">
          La descripcion es obligatoria

          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
    @enderror

    {{-- <Input type="text" ... value="{{ old('nombre') }}"> el {{ old('nombre') }} trae consigo el valor que tenia el
    <Input type="text" ... value="{{ old('descripcion') }}"> input en la pestania anterior si es que se recargo
         --}}

    <Input type="text" placeholder="Nombre" name="nombre" class="form-control mb-2" value="{{ $nota->nombre }}">
    <Input type="text" placeholder="Descripcion" name="descripcion" class="form-control mb-2" value="{{ $nota->descripcion }}">
    
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  
  </form>
  <br>
    
@endsection