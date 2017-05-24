@extends('layouts.master')

@section('title')
     Shopping Cart
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
@if($products->count())
@foreach($products->chunk(3) as $productChunks)
	<div class="row">  
  @foreach($productChunks as $product)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src= "{{$product->Imagepath}} "alt="" style = "height:150px">
      <div class="caption">
        <h3>{{$product->title}}</h3>
        <p>{{$product->description}}</p>
        
        <div class ="clearfix">
        	<div class ="pull-left" style ="font-weight:bold">${{$product->price}}</div>
        	<a href="{{route('product.addToCart',['id' => $product->id])}}" class="btn btn-success pull-right" role="button" id ="AC">Add to Cart</a> 
          </div>
      </div>
    </div>
    </div>
    @endforeach
  </div>
@endforeach
{{$products->links()}}  
@else
<p>Sorry,No matching Search Results</p>
@endif
@endsection
