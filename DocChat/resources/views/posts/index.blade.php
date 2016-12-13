@extends('layouts.app')

@section('content')
@if (Auth::guest())
<h1>You Have Not Logged In</h1>
@else
<div class="container">
	<div class="col-md-offset-2 col-md-8">


                            


		<div class="row">
			<h1>POST LIST</h1>


		</div>

		<!-- Display Success Message -->

		@if(Session::has('success'))

		<div class="alert alert-success">
			<strong>Success: </strong>{{Session::get('success')}}


		</div>




		@endif
 

 <!-- Display Error Message -->

 @if(count($errors)>0)

 <alert class="alert-danger">
 	
 	<strong>Error:</strong>
 	<ul>
 		@foreach($errors -> all() as $error)

 		<li>{{ $error }}</li>


 		@endforeach

 	</ul>
 </alert>



 @endif

 <div class="row">
 	
 	<form action="{{ route('posts.store')}}" method="POST">
    {{ csrf_field() }}
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

 		

 		<input type="hidden" name="newPostEmail" value="{{ Auth::user()->email }}">
 		<input type="hidden" name="newPostName" value="{{ Auth::user()->name }}">

 	</div>
 	
 	<div class="col-md-3" >
 		<input type="submit" name="" class="btn btn-primary btn-block" value="SUBMIT POST">

 	</div>
 		


 	</form>



 </div>



	</div>
		
		<!-- Display saved posts-->

		@if(count($storedPosts) >0)

<br/>

<br/>





 	
 	
 

 @endif


	</div>

<hr/>

<br/>

@foreach($storedPosts as $storedPost)
<div class="container"> 

	

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Created At {{$storedPost -> created_at}}</h3>
  </div>
  <div class="panel-body">
  {{$storedPost -> postContent}}
  </div>
  <div class="panel-footer">


  <b>Field: {{$storedPost -> postField}}. Posted By: {{$storedPost -> postName}} </b>

  <a href="{{route('posts.show',['posts'=>$storedPost->id])}}" class="btn btn-default">Comment</a>

@if( $storedPost->postEmail == Auth::user()->email )


  
  <a href="{{route('posts.edit',['posts'=>$storedPost->id])}}" class="btn btn-default">Edit</a>

  

			<form action="{{ route('posts.destroy',['posts'=>$storedPost->id])}}" method="POST">

			{{ csrf_field() }}

			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form>
  
@endif
       

       </div>
  </div>




</div>




@endforeach

@endif

@endsection

