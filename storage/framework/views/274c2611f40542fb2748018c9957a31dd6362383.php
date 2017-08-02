<?php $__env->startSection('content'); ?>
        <div class="jumbotron text-center">
                <div class="container">
                        <div class="row">      
                                <div class="col-sm-12">
                                        <div id="my-slider"vclass="carousel slide" data-ride="carousel">
                                                <!-- indicators dot nav -->
                                                        
                                                <!-- wrapper for slides -->
                                                        <div class="carousel-inner" role="listbox">
                                                                <div class="item active">
                                                                        <img src="/storage/cover_image/petcare1.jpg" alt="Pet Care"/>
                                                                        <div class="carousel-caption">
                                                                                <h4>One Stop Pet Care </h4>
                                                                        </div>
                                                                </div>
                                                                <div class="item">
                                                                        <img src="/storage/cover_image/petcare2.jpg" alt="Pet Care2"/>
                                                                        <div class="carousel-caption">
                                                                                <h4>For all Pets</h4>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                <!-- controls or next and prev buttons -->
                                                <a  class="left carousel-control" href="#my-slider" role="button" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#my-slider"  role="button" data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                </a>

                                        </div>


                                        <h1>Welcome to Laravel </h1>
                                        <p>This is the Laravel Application for Petcare</p>
                                        
                               
                                </div>
                        </div>
                
                
                </div>        
        </div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>