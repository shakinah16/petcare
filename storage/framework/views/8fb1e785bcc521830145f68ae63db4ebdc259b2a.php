<?php $__env->startSection('content'); ?>

    <a href="/products" class="btn btn-default">Go back</a>
    <h1><?php echo e($products->title); ?></h1>
    <img style="width:25%" src="/storage/product_image/<?php echo e($products->product_image); ?>" alt="">
    <br><br>
         <div><p><?php echo $products->body; ?></p></div>
         <hr>
         <div><p>Price: RM<?php echo $products->price; ?></p></div>
         <hr>
         <div><p>SKU:<?php echo $products->sku; ?></p></div>
         <hr>
         <div><p>Stock:<?php echo $products->stock; ?></p></div>
       <small>Created at: <?php echo e($products->created_at); ?></small><br>
        <small>Last updated: <?php echo e($products->updated_at); ?></small>
        <hr>

    

            <a href="/products/<?php echo e($products->id); ?>/edit" class="btn btn-default">Edit</a>

            <?php echo Form::open(['action' => ['ProductsController@destroy', $products->id], 'method' => 'POST', 'class' => 'pull-right' ]); ?>

            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

            <?php echo Form::close(); ?>

            <br><br>
          
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>