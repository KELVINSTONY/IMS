<?php $__env->startSection('content'); ?>

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
  <?php if($errors->any()): ?>
  <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
  </div>
<?php endif; ?>
    <div class="row mb-3 col-sm-6 py-2 wow fadeInLeft" >
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('products.index')); ?>"> Back</a>
            </div>
        </div>
    </div>



    <form class="contact-form mt-5" action="<?php echo e(route('products.store')); ?>" method="POST">
    	<?php echo csrf_field(); ?>
         <div class="row mb-3">
		    <div class="col-sm-6 py-2 wow fadeInLeft">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="fullName" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-sm-6 py-2 wow fadeInRight">
		        <div class="form-group">
		            <strong>Email</strong>
		            <input type="email" name="emailAddress" class="form-control" placeholder="email">
		        </div>
		    </div>
            <div class="col-12 py-2 wow fadeInUp">
		        <div class="form-group">
		            <strong>subject:</strong>
		            <input type="text" name="subject" class="form-control" placeholder="subject">
		        </div>
		    </div>
		    <div class="col-12 py-2 wow fadeInUp">
		        <div class="form-group">
		            <strong>message:</strong>
		            <textarea class="ckeditor form-control" style="height:150px" name="message" placeholder="message"></textarea>
		        </div>
		    </div>
            <div class="col-12 py-2 wow fadeInUp">
		        <div class="form-group">
		            
                   <select name="category" id="category" class="form-control">
                       <?php
                           $categories=\App\Category::all();
                       ?>
                       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value = "<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </select>
                </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary wow zoomIn">Submit</button>
		    </div>
		</div>
    </form>
    <?php $__env->startPush('js'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( 'CKEditor error: '+error );
            } );
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\IMS\resources\views/products/create.blade.php ENDPATH**/ ?>