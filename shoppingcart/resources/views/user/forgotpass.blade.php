@extends('layouts.master')
@section('title')
 Forgot Password
@endsection
@section('content')
@if(Session::has('success'))
<div class="row">  
    <div class="col-sm-6 col-md-4">
      <div id ="charge-message" class ="alert alert-success">
        {{Session::get('success')}}
      </div>
    </div>
</div>
@endif
<form action ="{{route('user.sendmail')}}" method ="get">
	<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
		<h2>Password Assistance</h2>
		<div class ="form-group">
		 <label>Enter your Email or mobile number</label>
		 <input type = "text" id ="forgot-password" name ="forgot-password" class ="form-control">
		 </div>
		 <button type = "submit">Continue</a>
		 
	</div>
	</div>
</form>
