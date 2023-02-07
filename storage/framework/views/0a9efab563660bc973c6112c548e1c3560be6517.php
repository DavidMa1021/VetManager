

<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td><?php echo e($client->id_number); ?></td>
                        <td><?php echo e($client->names); ?></td>
                        <td><?php echo e($client->lastnames); ?></td>
                        <td><?php echo e($client->email); ?></td>
                        <td><?php echo e($client->cellphone); ?></td>
                        <td><a href="<?php echo e(route('clients-show', $client->id)); ?>">editar</a></td>
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
                                                <form action="<?php echo e(route('clients-delete', $client->id)); ?>" method="POST">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-title text-center pt-3">
                    <h3>NUEVO CLIENTE</h3>



                </div>
                <div class="card-body px-5">
                    <form action="<?php echo e(route('newClient')); ?> " method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(session('success')): ?>
                        <h6 class="alert alert-success"><?php echo e(session('success')); ?></h6>
                        <?php endif; ?>
                        <?php $__errorArgs = ['names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['lastnames'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['id_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Docs\Trabajos\veterinary\resources\views/clients/index.blade.php ENDPATH**/ ?>