@extends('plantilla')

@section('seccion')

<h1 class="display-4">Notas</h1>

@if (session('mensaje'))
  <div class="alert alert-success">
    {{ session('mensaje') }}
  </div>    
@endif

  <form action="{{ route('notas.crear') }}" method="POST">

    @csrf

    @error('nombre')
        <div class="alert alert-danger">
          El nombre es obligatorio
        
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            {{-- <span aria-hidden="true">&times;</span> --}} X
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

    <Input type="text" placeholder="Nombre" name="nombre" class="form-control mb-2" value="{{ old('nombre') }}">
    <Input type="text" placeholder="Descripcion" name="descripcion" class="form-control mb-2" value="{{ old('descripcion') }}">
    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
  
  </form>
  <br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($notas as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>
                      <a href="{{ route('notas.detalle', $item) }}">
                        {{$item->nombre}}
                      </a>
                    </td>
                    <td>{{$item->descripcion}}</td>
                    <td>
                      <a href="{{ route('notas.editar', $item) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('notas.eliminar', $item) }}" method="POST" class="d-inline">

                        @method('DELETE')
                        @csrf
                        
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                      
                      </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $notas->links() }}

@endsection