<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary ml-lg-3" href="<?php echo e(route('patients.create')); ?>"> add patient</a>
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>date of Birth</th>
            <th>phone Number</th>
            <th>registered by</th>
            <th width="auto">Action</th>
        </tr>
        <?php
        $i = 0;
        ?>
        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($patient->firstName); ?></td>
                <td><?php echo e($patient->LastName); ?></td>
                <td><?php echo e($patient->address); ?></td>
                <td><?php echo e($patient->birthDate); ?></td>
                <td><?php echo e($patient->phone); ?></td>
                <td><?php echo e($patient->email); ?></td>
                <td>
                    <form action="<?php echo e(route('products.destroy', $patient->id)); ?>" method="POST">
                        <a class="btn btn-info" href="<?php echo e(route('patients.show', $patient->id)); ?>">Show</a>
                        <a class="btn btn-primary" href="<?php echo e(route('patients.edit', $patient->id)); ?>">Edit</a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\IMS\resources\views/patients/index.blade.php ENDPATH**/ ?>