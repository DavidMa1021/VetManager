@extends('app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-5">

            <div class="card mt-4">
                <div class="card-title text-center pt-3">
                    <h3>ACTUALIZAR DATOS CLIENTE</h3>



                </div>
                <div class="card-body px-5">
                    <form action="{{ route('clients-update', $client->id)}} " method="POST">
                        @method('PATCH')
                        @csrf
                        @if (session('success'))
                        <h6 class="alert alert-success">{{session('success')}}</h6>
                        @endif
                        @error('names')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        @error('lastnames')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        @error('id_number')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        @error('email')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        @error('cellphone')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                        <div class="mb-3">
                            <label for="names" class="form-label">Nombres</label>
                            <input type="name" class="form-control" name="names" value="{{$client->names}}">

                        </div>
                        <div class="mb-3">
                            <label for="lastnames" class="form-label">Apellidos</label>
                            <input type="lastename" class="form-control " name="lastnames" value="{{$client->lastnames}}">
                        </div>
                        <div class=" mb-3">
                            <label for="id_number" class="form-label">Número de documento</label>
                            <input type="text" class="form-control " name="id_number" value="{{$client->id_number}}" disabled>
                        </div>
                        <div class=" mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$client->email}}">
                        </div>
                        <div class=" mb-3">
                            <label for="cellphone" class="form-label">Número de celular</label>
                            <input type="phone" class="form-control" name="cellphone" value="{{$client->cellphone}}">
                        </div>

                        <button type=" submit" class="btn btn-primary mt-3">Actualizar datos</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <h5>MASCOTAS REGISTRADAS:</h5>

            @if ($client->pets->count() >0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre mascota</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client->pets as $pet )

                    <tr>

                        <td>{{$pet->name}}</td>
                        <td>{{$pet->type}}</td>
                        <!-- <td>{{$pet->lastnames}}</td> -->

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
            @else

            <p>No hay ninguna mascota registrada</p>
            @endif

        </div>

    </div>


</div>
@endsection