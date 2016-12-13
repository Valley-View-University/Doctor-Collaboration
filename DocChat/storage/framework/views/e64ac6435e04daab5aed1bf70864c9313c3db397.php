<?php $__env->startSection('content'); ?>
<?php if(Auth::guest()): ?>
<h1>You Have Not Logged In</h1>
<?php else: ?>

<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Edit Post</h1>
    </div>

    
    <?php if(Session::has('success')): ?>
      <div class="alert alert-success">
        <strong>Success:</strong> <?php echo e(Session::get('success')); ?>

      </div>
    <?php endif; ?>

    
    <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row">
      <form action="<?php echo e(route('posts.update', [$postUnderEdit->id])); ?>" method='POST'>
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name='_method' value='PUT'>

        <div class="form-group">
          <input type="text" name='updatedPostContent' class='form-control input-lg' value='<?php echo e($postUnderEdit->postContent); ?>'>
        </div>

        <br/>

       Select Field

 		<select name="updatedPostField" required>

 		 <
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Geriatry">Geriatry</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="Radiology">Radiology</option>
 			

 		</select>

 		<br/>
 		<br/>

        <div class="form-group">
          <input type="submit" value='Save Changes' class='btn btn-success btn-lg'>
          <a href="" class='btn btn-danger btn-lg pull-right'>Go Back</a>
        </div>
      </form>
    </div>

 
  </div>
</div>
<?php endif; ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>