<?php $__env->startSection('content'); ?>
<?php if(Auth::guest()): ?>
<h1>You Have Not Logged In</h1>
<?php else: ?>

<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Post </h1>
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

    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Created At <?php echo e($postUnderComment -> created_at); ?></h3>
  </div>
  <div class="panel-body">
  <?php echo e($postUnderComment -> postContent); ?>

  </div>
  <div class="panel-footer">


  <b>Field: <?php echo e($postUnderComment -> postField); ?>. Posted By: <?php echo e($postUnderComment -> postName); ?> </b>

  

<?php if( $postUnderComment->postEmail == Auth::user()->email ): ?>


  
  <a href="<?php echo e(route('posts.edit',['posts'=>$postUnderComment->id])); ?>" class="btn btn-default">Edit</a>

  

			<form action="<?php echo e(route('posts.destroy',['posts'=>$postUnderComment->id])); ?>" method="POST">

			<?php echo e(csrf_field()); ?>


			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form>
  
<?php endif; ?>
       

       </div>
  </div>




 
  </div>

  <div class="row">
	

<!--Display comment-->

	

<?php echo e($storedComment); ?>

<div class="container"> 

	

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Created At <?php echo e($comments -> created_at); ?></h3>
  </div>
  <div class="panel-body">
  <?php echo e($comments -> commentContent); ?>

  </div>
  <div class="panel-footer">


  <b>Field: <?php echo e($comments -> commentField); ?>. Posted By: <?php echo e($comments -> commentName); ?> </b>

  

<?php if( $storedPost->postEmail == Auth::user()->email ): ?>


  
  <a href="<?php echo e(route('posts.comment.edit',['comments'=>$comment->id])); ?>" class="btn btn-default">Edit</a>

  

			<form action="<?php echo e(route('posts.comment.destroy',['comments'=>$comment>id])); ?>" method="POST">

			<?php echo e(csrf_field()); ?>


			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form>
  

       

       </div>
  </div>




</div>
<?php endif; ?>




<!--Form to Add comments-->

<form action="<?php echo e(route('posts.comment.store', [$postUnderComment->id])); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

 	<div class="col-md-9">

 	
 		
 		
 		<textarea name="postUnderCommentContent" class="form-control" placeholder="Enter Comment here" required></textarea>

 		<br/>

 		

 		
     
 		<input type="hidden" name="postUnderCommentEmail" value="<?php echo e(Auth::user()->email); ?>">
 		<input type="hidden" name="postUnderCommentName" value="<?php echo e(Auth::user()->name); ?>">

 	</div>
 	
 	<div class="col-md-3" >
 		<input type="submit" name="" class="btn btn-primary btn-block" value="SUBMIT COMMENT">

 	</div>
 		


</form>

 	</div>






<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>