@extends('layouts.master')

@section('title')
	Sign in
@endsection

@section('content')
<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
	<h3>Please Sign In </h3>
	<form action ="{{route('user.signin')}}" method="post">
		<div class ="form-group">
		 <label for ="email">Email</label>
		 <input type = "text" id ="email" name ="email" class ="form-control">
		 </div>

		 <div class ="form-group">
		 <label for ="password">Password</label>
		 <input type = "password" id ="password" name ="password" class ="form-control">
		 </div>
		 <button type ="submit" class ="btn btn-primary">Sign In</button>
		 <p>Don't have an account? <a href ="{{route('diary.index')}}" >Register</a></p>
		 {{csrf_field()}}
	</form>

	</div>
	</div>


@endsection