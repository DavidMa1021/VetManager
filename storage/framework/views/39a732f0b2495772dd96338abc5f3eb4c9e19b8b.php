

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row">
        <div class="col-md-5">

            <div class="card mt-4">
                <div class="card-title text-center pt-3">
                    <h3>ACTUALIZAR DATOS CLIENTE</h3>



                </div>
                <div class="card-body px-5">
                    <form action="<?php echo e(route('clients-update', $client->id)); ?> " method="POST">
                        <?php echo method_field('PATCH'); ?>
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
                            <input type="name" class="form-control" name="names" value="<?php echo e($client->names); ?>">

                        </div>
                        <div class="mb-3">
                            <label for="lastnames" class="form-label">Apellidos</label>
                            <input type="lastename" class="form-control " name="lastnames" value="<?php echo e($client->lastnames); ?>">
                        </div>
                        <div class=" mb-3">
                            <label for="id_number" class="form-label">Número de documento</label>
                            <input type="text" class="form-control " name="id_number" value="<?php echo e($client->id_number); ?>" disabled>
                        </div>
                        <div class=" mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo e($client->email); ?>">
                        </div>
                        <div class=" mb-3">
                            <label for="cellphone" class="form-label">Número de celular</label>
                            <input type="phone" class="form-control" name="cellphone" value="<?php echo e($client->cellphone); ?>">
                        </div>

                        <button type=" submit" class="btn btn-primary mt-3">Actualizar datos</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <h5>MASCOTAS REGISTRADAS:</h5>

            <?php if($client->pets->count() >0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre mascota</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $client->pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td><?php echo e($pet->name); ?></td>
                        <td><?php echo e($pet->type); ?></td>
                        <!-- <td><?php echo e($pet->lastnames); ?></td> -->

                        <td><a href="<?php echo e(route('pets.show', $pet->id)); ?>">editar</a></td>
                        <td>
                            <form action="<?php echo e(route('pets.destroy', $pet->id)); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger">eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <?php else: ?>

            <p>No hay ninguna mascota registrada</p>
            <?php endif; ?>

        </div>

    </div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Docs\Trabajos\veterinary\resources\views/clients/show.blade.php ENDPATH**/ ?>