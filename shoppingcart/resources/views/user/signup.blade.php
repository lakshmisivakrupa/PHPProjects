@extends('layouts.master')
@section('title')
 Sign Up User
@endsection
@section('content')
 @if($errors->any())
   @foreach ($errors->all() as $message) 
      <div>{{ $message }}</div>
  @endforeach
@endif

<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
		<h1>SignUp</h1>
		<form action ="{{route('user.signup')}}" method="post">
		<div class ="form-group">
		 <label for ="email">Email</label>
		 <input type = "text" id ="email" name ="email" class ="form-control">
		 </div>

		 <div class ="form-group">
		 <label for ="password">Password</label>
		 <input type = "password" id ="password" name ="password" class ="form-control">
		 </div>
		 <button type ="submit" class ="btn btn-primary">Sign Up</button>
		 <p>Have an account?Please <a href="{{route('user.signin')}}">Sign In</a>
		 {{csrf_field()}}
		 </form>
	</div>
</div>
@endsection
