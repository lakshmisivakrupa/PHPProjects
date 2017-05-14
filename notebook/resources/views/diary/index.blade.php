@extends('layouts.master')

@section('title')
	Your NoteBook
@endsection

@section('content')
@if($errors->any())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
	<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
	<h3>Your NoteBooK</h3>
	<p>Store your thoughts permanently and securely</p>
	<p>Interested?<strong>Sign Up </strong>now.</p>
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
		 <p>Have an account? <a href ="{{route('user.signin')}}" >Log In</a></p>
		 {{csrf_field()}}
	</form>

	</div>
	</div>
@endsection