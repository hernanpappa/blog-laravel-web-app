@extends('plantilla')

@section('seccion')

    <h1>Este es nuestro equipo de trabajo</h1>

    @foreach($equipo as $item)

        <a href="{{ route('nosotros', $item) }}" class="h4 text-danger" >{{ $item }}</a><br>

    @endforeach

    @if(!empty($nombre)) <!-- empty pregunta si la variable existe -->

        @switch($nombre)

            @case($nombre == 'Ignacio')

                <h2 class="mt-5">El nombre es {{ $nombre }}:</h2>
                <p>{{ $nombre }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quo incidunt ab molestiae neque. Debitis voluptatem facilis recusandae! Voluptatibus, voluptatem consequuntur eos sed ea praesentium nulla soluta expedita quidem aperiam.</p>

                @break

            @case($nombre == 'Juanitos')

                <h2 class="mt-5">El nombre es {{ $nombre }}:</h2>
                <p>{{ $nombre }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quo incidunt ab molestiae neque. Debitis voluptatem facilis recusandae! Voluptatibus, voluptatem consequuntur eos sed ea praesentium nulla soluta expedita quidem aperiam.</p>

                @break

            @case($nombre == 'Los pablos')

                <h2 class="mt-5">El nombre es {{ $nombre }}:</h2>
                <p>{{ $nombre }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore quo incidunt ab molestiae neque. Debitis voluptatem facilis recusandae! Voluptatibus, voluptatem consequuntur eos sed ea praesentium nulla soluta expedita quidem aperiam.</p>

                @break

        @endswitch

    @endif

@endsection