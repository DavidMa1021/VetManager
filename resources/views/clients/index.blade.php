@extends('app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <h1>CLIENTES</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Num de Documento</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client )

                    <tr>

                        <td>{{$client->id_number}}</td>
                        <td>{{$client->names}}</td>
                        <td>{{$client->lastnames}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->cellphone}}</td>
                        <td><a href="{{ route('clients-show', $client->id)}}">editar</a></td>
                        <td>
                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#deleteClient">Eliminar</button>
                            
                            <div class="modal fade" id="deleteClient" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Eliminar cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Esta seguro que desea eliminar cliente ? , esta accion eliminará todas las mascotas asociadas.
                                        </div>
                                        <div class="modal-footer">
                                                <form action="{{route('clients-delete', $client->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-title text-center pt-3">
                    <h3>NUEVO CLIENTE</h3>



                </div>
                <div class="card-body px-5">
                    <form action="{{ route('newClient')}} " method="POST">
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
                            <input type="name" class="form-control" name="names">

                        </div>
                        <div class="mb-3">
                            <label for="lastnames" class="form-label">Apellidos</label>
                            <input type="lastename" class="form-control" name="lastnames">
                        </div>
                        <div class="mb-3">
                            <label for="id_number" class="form-label">Número de documento</label>
                            <input type="text" class="form-control" name="id_number">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="cellphone" class="form-label">Número de celular</label>
                            <input type="phone" class="form-control" name="cellphone">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Registar Cliente</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <!-- Modal trigger button
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#deleteClient">
      Launch
    </button> -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->



    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
</div>
@endsection