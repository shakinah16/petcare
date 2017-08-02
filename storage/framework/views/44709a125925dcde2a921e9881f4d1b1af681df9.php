<?php $__env->startSection('content'); ?>
    <h1>Pets</h1>
    <?php if(count($pets) > 0): ?>
        <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="well">
                <h3><a href="/pets/<?php echo e($pet->id); ?>"><?php echo e($pet->name); ?></a></h3>
                <small>Owner: <?php echo e($pet->user->name); ?></small>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($pets->links()); ?>

    <?php else: ?>
        <p class="label label-warning">No pets found</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>