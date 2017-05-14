@extends('layouts.master')
@section('title')
 Sign In User
@endsection
@section('content')
@if($errors->any())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
  @endif
<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
		<h1>SignIn</h1>
		<form action ="{{route('user.signin')}}" method="post">
		<div class ="form-group">
		 <label for ="email">Email</label>
		 <input type = "text" id ="email" name ="email" class ="form-control">
		 </div>

		 <div class ="form-group">
		 <label for ="password">Password</label>
		 <input type = "password" id ="password" name ="password" class ="form-control">
		 <a href="{{route('user.getpass')}}">Forgot Password</a>
		 </div>
		 <button type ="submit" class ="btn btn-primary">Sign In</button>
		 {{csrf_field()}}
		 </form>
		 <p>Don't have an account?Please <a href="{{route('user.signup')}}">Sign Up</a></p>
	</div>
</div>
@endsection
