<?php $__env->startSection('content'); ?>
    <h1>Edit Product</h1>
    <?php echo Form::open(['action' => ['ProductsController@update', $products->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <div class="form-group">
        <?php echo e(Form::label('title', 'Title')); ?>

        <?php echo e(Form::text('title', $products->title, ['class' => 'form-control', 'placeholder'=>'Title'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('body', 'Body')); ?>

        <?php echo e(Form::textarea('body', $products->body, ['class' => 'form-control', 'placeholder'=>'Body', 'id'=>'article-ckeditor'])); ?>

    </div>
    <div class="form-group" step="any">
            <?php echo e(Form::label('price', 'Price')); ?>

            <?php echo Form::number('price',$products->price,['class' => 'form-control','step'=>'any', 'placeholder'=>'Price']); ?>

    </div>
    <div class="form-group">
            <?php echo e(Form::label('sku', 'SKU')); ?>

            <?php echo e(Form::text('sku', $products->sku, ['class' => 'form-control', 'placeholder'=>'Stock Keeping Unit'])); ?>

    </div>
    <div class="form-group">
            <?php echo e(Form::label('stock', 'Stock')); ?>

            <?php echo e(Form::number('stock', $products->stock, ['class' => 'form-control', 'placeholder'=>'Stock'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::file('product_image')); ?>

    </div>
    <?php echo e(Form::hidden('_method', 'PUT')); ?>

    <?php echo e(Form::submit('Submit', ['class'=>'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>