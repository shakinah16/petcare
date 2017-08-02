<?php $__env->startSection('content'); ?>
    <h1>Products</h1>
    <?php if(count($products) > 0): ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="well">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <img style="width:75%" src="/storage/product_image/<?php echo e($product->product_image); ?>" alt="">
                </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/products/<?php echo e($product->id); ?>"><?php echo e($product->title); ?></a></h3>
                    </div>

              </div>  
                
            
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($products->links()); ?>

    <?php else: ?>
        <p class="label label-warning">No products found</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>