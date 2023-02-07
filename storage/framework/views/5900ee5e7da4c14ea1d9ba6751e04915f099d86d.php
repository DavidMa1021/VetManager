

<?php $__env->startSection('content'); ?>
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
                    
                    <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td><?php echo e($pet->name); ?></td>
                        <td><?php echo e($pet->type); ?></td>
                        <td><?php echo e($pet->names .' '.$pet->lastnames); ?></td>

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
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-title text-center pt-3">
                    <h3>REGISTRAR MASCOTA</h3>



                </div>
                <div class="card-body px-5">
                    <form action="<?php echo e(route('pets.store')); ?> " method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(session('success')): ?>
                        <h6 class="alert alert-success"><?php echo e(session('success')); ?></h6>
                        <?php endif; ?>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['owner'];
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
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->id); ?>"><?php echo e(($client->names . ' ' .$client->lastnames )); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                            <button type="submit" class="btn btn-primary mt-3">Registar Mascota</button>

                        

                
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Docs\Trabajos\veterinary\resources\views/pets/index.blade.php ENDPATH**/ ?>