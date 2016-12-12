@extends('layouts.menu')


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

 	
 		
 		<input type="text" name="newPostContent" class="form-control" placeholder="Enter Post Here">

 		<br/>

 		Select Field

 		<select name="newPostField">

 		 <option> Select a Field</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Geriatry">Geriatry</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="Radiology">Radiology</option>
 			

 		</select>

 		<input type="hidden" name="newPostEmail" value="{{ Auth::user()->email }}">

 	</div>
 	
 	<div class="col-md-3" >
 		<input type="submit" name="" class="btn btn-primary btn-block" value="SUBMIT POST">

 	</div>
 		


 	</form>



 </div>



	</div>
		
		<!-- Display saved posts-->

		@if(count($storedPosts) >0)



<table class="table">
	
	<thead>
		
		<th>POST</th>

		<th>Field</th>
		<th>Edit</th>
		<th>Delete</th>


	</thead>

	<tbody>
			@foreach($storedPosts as $storedPost)

			<tr>


			<td>{{$storedPost -> content}}</td>

			<td>{{$storedPost -> field}}</td>

			<td>{{$storedTPost -> email}}</td>

			<td><a href="{{route('posts.edit',['posts'=>$storedPost->id])}}" class="btn btn-default">Edit</a></td>

			<td><form action="{{ route('posts.destroy',['posts'=>$storedPost->id])}}" method="POST">

			{{ csrf_field() }}

			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form></td>

			</tr>


			@endforeach
			
		</tbody>
</table>




 	
 	
 

 @endif


	</div>

@endif
</div>

