@extends('layouts.master')

@section('title')
	View shopping Cart
@endsection

@section('content')
@if(Session::has('cart'))

 <table class="table">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>SubTotal</th>
                        
                    </tr>
                </thead>

                <tbody>
                @foreach($products as $product)
                    <tr>

                    <td class="table-image">{{$product['item']['title']}}</td>               
                    <td class = "table-image">

                    <select class="quantity" data-id="{{ $product['item']['id'] }}">
                                <option {{ $product['qty'] == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $product['qty'] == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $product['qty'] == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $product['qty'] == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $product['qty'] == 5 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 6 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 7 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 8 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 9 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 10 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 11 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 12 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 13 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 14 ? 'selected' : '' }}>5</option>
				<option {{ $product['qty'] == 15 ? 'selected' : '' }}>5</option>
				
                            </select>
                    </td>              
                    
                    <td class ="table-image" ><label id ="price">${{$product['item']['price']}}</label>

                    </td>

                     <td class ="table-image" ><label id ="sub">${{$product['price']}}</label></td>
                    </tr>
                @endforeach

                    <tr><td><label>Cart Total: ${{$totalPrice}}</label><a href ="{{route('checkout')}}" type ="button" class="btn btn-success">CheckOut</a>
                    <a href ="{{route('emptyCart')}}" class="btn btn-success pull-right">Empty Cart</a>                
                    </td></tr>
                    <tr><td><a href ="{{route('product.index')}}" type ="button" class="btn btn-success pull-left">Continue Shopping</a></td></tr>
                    @else
                    <tr><td>There is no Item in Cart</td></tr>
                </tbody>
            </table>

                
            @endif

 @endsection
 @section('scripts')

<script type="text/javascript" src="{{URL::to('js/update.js')}}"></script>
@endsection
