

<?php $__env->startSection('content'); ?>

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
                <form action="<?php echo e(route('appointments.store')); ?>" method="POST">
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
                        <label for="pet_id" class="form-label">Mascota</label>
                        <select class="form-select" aria-label="Mascota" name="pet_id">
                            <option selected>Seleccione una mascota</option>
                            <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pet->id); ?>"><?php echo e(($pet->name . ' (' .$pet->names.' ' .$pet->lastnames.')' )); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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





<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Docs\Trabajos\veterinary\resources\views/appointment/index.blade.php ENDPATH**/ ?>