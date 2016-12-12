@extends('layouts.menu');

@if(Auth::guest())

<h1>You Have Not Logged In</h1>
@else

<div class="container">

<div class="col-md-offset-2 col-md-8">
	

	<div class="row">

	<h1>Posts</h1>
		


	</div>

	<!--Display success message here -->

	@if(Session::has('success'))

	<div class="alert alert-success">

	<strong>Success: </strong>{{Session:: get('success')}}
		

	</div>
	

	@endif


</div>



</div>