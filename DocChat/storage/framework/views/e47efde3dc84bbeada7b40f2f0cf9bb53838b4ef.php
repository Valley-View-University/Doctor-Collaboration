<?php $__env->startSection('content'); ?>
<?php if(Auth::guest()): ?>
<h1>You Have Not Logged In</h1>
<?php else: ?>
<div class="container">
	<div class="col-md-offset-2 col-md-8">


                            


		<div class="row">
			<h1>POST LIST</h1>


		</div>

		<!-- Display Success Message -->

		<?php if(Session::has('success')): ?>

		<div class="alert alert-success">
			<strong>Success: </strong><?php echo e(Session::get('success')); ?>



		</div>




		<?php endif; ?>
 

 <!-- Display Error Message -->

 <?php if(count($errors)>0): ?>

 <alert class="alert-danger">
 	
 	<strong>Error:</strong>
 	<ul>
 		<?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

 		<li><?php echo e($error); ?></li>


 		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

 	</ul>
 </alert>



 <?php endif; ?>

 <div class="row">
 	
 	<form action="<?php echo e(route('posts.store')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

 	<div class="col-md-9">

 	
 		
 		<!-- <input type="textarea" name="newPostContent" class="form-control" placeholder="Enter Post Here"> -->
 		<textarea name="newPostContent" class="form-control" placeholder="Enter Post Here" required></textarea>

 		<br/>

 		Select Field

 		<select name="newPostField" required>

 		 <
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Geriatry">Geriatry</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="Radiology">Radiology</option>
 			

 		</select>

 		

 		<input type="hidden" name="newPostEmail" value="<?php echo e(Auth::user()->email); ?>">
 		<input type="hidden" name="newPostName" value="<?php echo e(Auth::user()->name); ?>">

 	</div>
 	
 	<div class="col-md-3" >
 		<input type="submit" name="" class="btn btn-primary btn-block" value="SUBMIT POST">

 	</div>
 		


 	</form>



 </div>



	</div>
		
		<!-- Display saved posts-->

		<?php if(count($storedPosts) >0): ?>

<br/>

<br/>





<!--
<table class="table">
	
	<thead>
		
		<th>POST</th>

		<th>Field</th>
		<th>Edit</th>
		<th>Delete</th>


	</thead>

	<tbody>
			<?php $__currentLoopData = $storedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storedPost): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

			<tr>


			<?php echo e($storedPost -> postContent); ?>


			<?php echo e($storedPost -> postField); ?>


			<?php echo e($storedPost -> postName); ?>


			<?php echo e($storedPost -> created_at); ?>


			</td>

			</tr>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			
		</tbody>
</table>

-->


 	
 	
 

 <?php endif; ?>


	</div>

<hr/>

<br/>

<?php $__currentLoopData = $storedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storedPost): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<div class="container"> 

	

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Created At <?php echo e($storedPost -> created_at); ?></h3>
  </div>
  <div class="panel-body">
  <?php echo e($storedPost -> postContent); ?>

  </div>
  <div class="panel-footer">


  <b>Field: <?php echo e($storedPost -> postField); ?>. Posted By: <?php echo e($storedPost -> postName); ?> </b>

  <a href="<?php echo e(route('posts.show',['posts'=>$storedPost->id])); ?>" class="btn btn-default">Comment</a>

<?php if( $storedPost->postEmail == Auth::user()->email ): ?>


  
  <a href="<?php echo e(route('posts.edit',['posts'=>$storedPost->id])); ?>" class="btn btn-default">Edit</a>

  

			<form action="<?php echo e(route('posts.destroy',['posts'=>$storedPost->id])); ?>" method="POST">

			<?php echo e(csrf_field()); ?>


			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form>
  
<?php endif; ?>
       

       </div>
  </div>




</div>




<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>