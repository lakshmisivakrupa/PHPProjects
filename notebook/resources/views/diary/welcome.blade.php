@extends('layouts.master')

@section('title')
	Welcome !!!
@endsection
@section('style')
<style>
	#diary {
	  background-color:pink;
	  width: 1000px;
  	  height: 550px;
	}
</style>
@endsection
@section('content')

<div class = "container-fluid" >
	
		<textarea id="diary" class ="form-control" placeholder="Capture your thoughts here!!">{{$contents}}</textarea>

		<button id ="saveContent" class ="btn btn-primary pull-right">Post</button>
            
</div>

@endsection

@section('scripts')
	<script type="text/javascript" src="{{URL::to('js/post.js')}}"></script>
@endsection
