@extends('app')

@section('content')

<div class="container">

    <div class="card mt-4">
        <div class="card-title text-center pt-3">
            <h3>ACTUALIZAR DATOS MASCOTA</h3>



        </div>
        <div class="card-body px-5">
            <form action="{{ route('pets.update', $pet->id)}} " method="POST">
                @method('PATCH')
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

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre mascota</label>
                            <input type="name" class="form-control" name="name" value="{{$pet->name}}">

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
                        

                        <button type="submit" class="btn btn-primary mt-3">Actualizar Datos</button>
            </form>
        </div>

    </div>

</div>
@endsection