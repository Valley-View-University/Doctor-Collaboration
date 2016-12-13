@extends('layouts.app')

@section('content')



    @if (Auth::guest())
<h1>You Have Not Logged In</h1>
@else
<div class="container">
    <div class="col-md-offset-2 col-md-8">


                            


        <div class="row">
            <h1>EDIT LIST</h1>


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
        <textarea name="newPostContent" class="form-control" placeholder="Enter Post Here" >{{$postUnderEdit->postContent}}</textarea>

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
                                    <!-- <option></option> -->
            

        </select>

        <!-- <input type="file" name="Upload"> -->

        <input type="hidden" name="newPostEmail" value="{{ Auth::user()->email }}">

    </div>
    
    <div class="col-md-3" >
        <input type="submit" name="" class="btn btn-success btn-block" value="UPDATE POST">

    </div>
        


    </form>



 </div>



    </div>
    @endif
    </div>



@endsection