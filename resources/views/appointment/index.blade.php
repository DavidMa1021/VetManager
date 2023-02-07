@extends('app')

@section('content')

<div class="container">

    <div id='schedule'>

    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointment">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">NUEVA CITA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('appointments.store')}}" method="POST">
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
                        <label for="pet_id" class="form-label">Mascota</label>
                        <select class="form-select" aria-label="Mascota" name="pet_id">
                            <option selected>Seleccione una mascota</option>
                            @foreach ($pets as $pet )
                            <option value="{{$pet->id}}">{{($pet->name . ' (' .$pet->names.' ' .$pet->lastnames.')' )}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Fecha inicial</label>
                        <input type="text" class="form-control" name="start_date">

                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Fecha final</label>
                        <input type="text" class="form-control" name="end_date">

                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Hora inicial</label>
                        <input type="time" step="1800" min="06:00" max="18:00" class="form-control" name="start_time">

                        

                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Hora final</label>
                        <input type="time" step="1800" min="06:00" max="19:00" class="form-control" name="end_time">

                    </div>
                    <div class="text-end mt-3">
                
                        <button type="submit" class="btn btn-primary ">Guardar</button>              
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>

                    
                </form>
            </div>
            
        </div>
    </div>
</div>





@endsection