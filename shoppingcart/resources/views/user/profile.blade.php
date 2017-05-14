@extends('layouts.master')

@section('title')
 My Profile
@endsection

@section('content')

 
 <div class ="row">
	<div class = "col-md-4 col-md-offset-4">
		<h2>My Orders</h2>
		<table class="table">
		<thead>
                    <tr>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        
                    </tr>
                </thead>
	@foreach($orders as $order)
		<tbody>
		@foreach($order->cart->items as $item)
			<tr>
				<td class="table-image">{{$item['item']['title']}}</td>
				<td class="table-image">{{$item['qty']}}</td>	
				<td class="table-image">${{$item['price']}}</td>
				
			</tr>
		@endforeach
		<tr><td class="table-image"><strong> Total Price: ${{$order->cart->totalPrice}}</strong></td></tr>
		</tbody>
	@endforeach
		</table>

	</div>
</div>
@endsection
