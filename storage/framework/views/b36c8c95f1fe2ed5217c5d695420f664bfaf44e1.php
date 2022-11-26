<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-create')): ?>
                <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>"> Create New Product</a>
                <?php endif; ?>
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
            <th>email</th>
            <th>subject</th>
            <th width="280px">Action</th>
        </tr>
        <?php
    $i = 0;
   ?>
	    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <tr>
	        <td><?php echo e(++$i); ?></td>
	        <td><?php echo e($product->fullName); ?></td>
	        <td><?php echo e($product->emailAddress); ?></td>
            <td><?php echo e($product->subject); ?></td>
	        <td>
                <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
                    <a class="btn btn-info" href="<?php echo e(route('products.show',$product->id)); ?>">Show</a>
                     <a class="btn btn-primary" href="<?php echo e(route('products.edit',$product->id)); ?>">Edit</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\IMS\resources\views/products/index.blade.php ENDPATH**/ ?>