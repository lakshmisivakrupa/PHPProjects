@extends('layouts.master')
@section('title')
 Forgot Password
@endsection
@section('content')
	<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
		<h2>Password Assistance</h2>
		<div class ="form-group">
		 <label>Enter your Email or mobile number</label>
		 <input type = "text" id ="forgot-password" name ="forgot-password" class ="form-control">
		 </div>
		 <a href="#" class ="btn btn-primary">Continue</a>
		 
	</div>
	</div>
@endsection