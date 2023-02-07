

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card mt-4">
        <div class="card-title text-center pt-3">
            <h3>ACTUALIZAR DATOS MASCOTA</h3>



        </div>
        <div class="card-body px-5">
            <form action="<?php echo e(route('pets.update', $pet->id)); ?> " method="POST">
                <?php echo method_field('PATCH'); ?>
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

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre mascota</label>
                            <input type="name" class="form-control" name="name" value="<?php echo e($pet->name); ?>">

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Docs\Trabajos\veterinary\resources\views/pets/show.blade.php ENDPATH**/ ?>