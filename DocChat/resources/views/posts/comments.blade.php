

@extends('layouts.app')

@section('content')
@if (Auth::guest())
<h1>You Have Not Logged In</h1>
@else

<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Post </h1>
    </div>

    {{-- display success message --}}
    @if (Session::has('success'))
      <div class="alert alert-success">
        <strong>Success:</strong> {{ Session::get('success') }}
      </div>
    @endif

    {{-- display error message --}}
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Created At {{$postUnderComment -> created_at}}</h3>
  </div>
  <div class="panel-body">
  {{$postUnderComment -> postContent}}
  </div>
  <div class="panel-footer">


  <b>Field: {{$postUnderComment -> postField}}. Posted By: {{$postUnderComment -> postName}} </b>

  

@if( $postUnderComment->postEmail == Auth::user()->email )


  
  <a href="{{route('posts.edit',['posts'=>$postUnderComment->id])}}" class="btn btn-default">Edit</a>

  

			<form action="{{ route('posts.destroy',['posts'=>$postUnderComment->id])}}" method="POST">

			{{ csrf_field() }}

			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form>
  
@endif
       

       </div>
  </div>




 
  </div>

  <div class="row">
	

<!--Display comment-->

	

{{$storedComment}}
<div class="container"> 

	

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Created At {{$comments -> created_at}}</h3>
  </div>
  <div class="panel-body">
  {{$comments -> commentContent}}
  </div>
  <div class="panel-footer">


  <b>Field: {{$comments -> commentField}}. Posted By: {{$comments -> commentName}} </b>

  

@if( $storedPost->postEmail == Auth::user()->email )


  
  <a href="{{route('posts.comment.edit',['comments'=>$comment->id])}}" class="btn btn-default">Edit</a>

  

			<form action="{{ route('posts.comment.destroy',['comments'=>$comment>id])}}" method="POST">

			{{ csrf_field() }}

			<input type="hidden" name="_method" value="DELETE">
				
				<input type="submit" class="btn btn-danger" value="delete">
			</form>
  

       

       </div>
  </div>




</div>
@endif




<!--Form to Add comments-->

<form action="{{ route('posts.comment.store', [$postUnderComment->id])}}" method="POST">
    {{ csrf_field() }}
 	<div class="col-md-9">

 	
 		
 		
 		<textarea name="postUnderCommentContent" class="form-control" placeholder="Enter Comment here" required></textarea>

 		<br/>

 		

 		
     
 		<input type="hidden" name="postUnderCommentEmail" value="{{ Auth::user()->email }}">
 		<input type="hidden" name="postUnderCommentName" value="{{ Auth::user()->name }}">

 	</div>
 	
 	<div class="col-md-3" >
 		<input type="submit" name="" class="btn btn-primary btn-block" value="SUBMIT COMMENT">

 	</div>
 		


</form>

 	</div>






@endif

@endsection
