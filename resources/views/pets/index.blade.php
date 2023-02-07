@extends('app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <h1>MASCOTAS</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre mascota</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Dueño</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($pets as $pet )

                    <tr>

                        <td>{{$pet->name}}</td>
                        <td>{{$pet->type}}</td>
                        <td>{{$pet->names .' '.$pet->lastnames}}</td>

                        <td><a href="{{ route('pets.show', $pet->id)}}">editar</a></td>
                        <td>
                            <form action="{{route('pets.destroy', $pet->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-title text-center pt-3">
                    <h3>REGISTRAR MASCOTA</h3>



                </div>
                <div class="card-body px-5">
                    <form action="{{ route('pets.store')}} " method="POST">
                        @csrf
                        @if (session('success'))
                        <h6 class="alert alert-success">{{session('success')}}</h6>
                        @endif
                        @error('name')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        @error('type')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        @error('owner')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre mascota</label>
                            <input type="name" class="form-control" name="name">

                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipo mascota</label>
                            <select class="form-select" aria-label="Tipo de mascota" name="type">
                                <option selected>Selecciona el tipo de mascota</option>
                                <option value="PERRO">Perro</option>
                                <option value="GATO">Gato</option>
                                <option value="CONEJO">Conejo</option>
                                <option value="CABALLO">Caballo</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Dueño</label>
                            <select class="form-select" aria-label="Dueño de mascota" name="owner">
                            @foreach ($clients as $client )
                                <option value="{{$client->id}}">{{($client->names . ' ' .$client->lastnames )}}</option>
                            @endforeach
                            </select>
                        </div>


                            <button type="submit" class="btn btn-primary mt-3">Registar Mascota</button>

                        

                
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection