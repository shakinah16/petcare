<?php $__env->startSection('content'); ?>

    <a href="/pets" class="btn btn-default">Go back</a>
    <h1><?php echo e($pet->name); ?></h1>
    <div><p>Type: <?php echo e($pet->type); ?></p></div>
    <div><p>Color: <?php echo e($pet->color); ?></p></div>
    <div><p>Owner: <?php echo e($pet->user->name); ?></p></div>

         <hr>
       <small>Created at: <?php echo e($pet->created_at); ?></small><br>
        <small>Last updated: <?php echo e($pet->updated_at); ?></small>
        <hr>
        <a href="/pets/<?php echo e($pet->id); ?>/edit" class="btn btn-default">Edit</a>

        <?php echo Form::open(['action' => ['PetsController@destroy', $pet->id], 'method' => 'pet', 'class' => 'pull-right' ]); ?>

        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

        <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

        <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>