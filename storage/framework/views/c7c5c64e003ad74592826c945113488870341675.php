<?php $__env->startSection('content'); ?>
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/blog/blog_4.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">our services</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>services</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary ml-lg-3" href="<?php echo e(route('services.create')); ?>"> Create New service</a>
            </div>
        </div>
    </div>


    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="auto">Action</th>
        </tr>
            <?php
                $i = 0;
             ?>
	    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <tr>
	        <td><?php echo e(++$i); ?></td>
	        <td><?php echo e($service->name); ?></td>
	        <td>
                <form action="<?php echo e(route('services.destroy',$service->id)); ?>" method="POST">
                    <a class="btn btn-info" href="<?php echo e(route('services.show',$service->id)); ?>">Show</a>
                     <a class="btn btn-primary" href="<?php echo e(route('services.edit',$service->id)); ?>">Edit</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\IMS\resources\views/services/index.blade.php ENDPATH**/ ?>