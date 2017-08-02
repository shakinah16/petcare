<?php $__env->startSection('content'); ?>
    <h1>Add Pet</h1>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <?php echo Form::open(['action'=>'PetsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

        <div class="form-group">
            <?php echo e(Form::label('name', 'Name')); ?>

            <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Name'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('type', 'Type')); ?>

            <?php echo e(Form::text('type', '', ['class' => 'form-control', 'placeholder'=>'Type'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('color', 'Color')); ?>

            <?php echo e(Form::text('color', '', ['class' => 'form-control', 'placeholder'=>'Color'])); ?>

        </div>
        <div class="form-group">
                <?php echo e(Form::file('pet_image')); ?>

            </div>

        <?php echo e(Form::submit('Submit', ['class'=>'btn btn-primary'])); ?>

        <?php echo Form::close(); ?>

      </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>