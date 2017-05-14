<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;
class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	 return view('shop.index', ['products' =>$products]);
    }
     public function getaddToCart(Request $request,$id)
    {
    	$product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart',$cart);

        return redirect()->route('product.index');
    }
    public function postupdateCart(Request $request)
    {
       
        $oldCart = Session::has('cart')?Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->update($request->id, $request->txt);
       
        Session::put('cart',$cart);

        return response()->json(['success' => true]);
    }

    public function getemptyCart()
    {
       
        if(!Session::has('cart'))
        {
         return view('shop.shoppingcart', ['products' =>null]);
        }
        else
        {
            Session::forget('cart');
            return view('shop.shoppingcart', ['products' =>null]);
        }

        }
    public function getCart()
    {
    	if(!Session::has('cart'))
    	{
    	 return view('shop.shoppingcart', ['products' =>null]);
    	}
    	else
    	{
    		$oldCart = Session::get('cart');
    		$cart = new Cart($oldCart);
    		return view('shop.shoppingcart',['products' => $cart->items,
    			'totalPrice' => $cart->totalPrice]);
    	}
    }
    public function postSearchResults(Request $request)
    {
        $title = $request->input('title');
        $products = DB::table('products')
                ->where('title', 'like', "%$title%")
                ->get();
        
        return view('shop.index',['products' => $products]);
        


    }
    public function getCheckout()
    {
    	if(!Session::has('cart'))
    	{
    	 return view('shop.shoppingcart');
    	}
    	else
    	{
    		$oldCart = Session::get('cart');
    		$cart = new Cart($oldCart);
    		$total = $cart->totalPrice;
    		return view('shop.checkout',['total' => $total]);
    	}
    }

    public function postCheckout(Request $request)
    {
    	if(!Session::has('cart'))
    	{
    	 return redirect()->route('shop.shoppingcart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	Stripe::setApiKey('sk_test_N2OpmaBa07QYe9dkJoaK41Hw');
    	try
    	{
    	  $charge = Charge::create(array(
		 				"amount" => $cart->totalPrice*100,
		 				"currency" => "usd",
		  				"source" => $request->input('stripeToken'),
		                "description" => "Test Charge"
                     ));
          $order = new Order();
          $order->cart = serialize($cart); //convert cart object to string to store in database
          $order->address = $request->input('address');
          $order->name = $request->input('name');
          $order->payment_id = $charge->id;

          Auth::user()->orders()->save($order);
    	}
    	catch(\Exception $e)
    	{
    		return redirect()->route('checkout')->with('error', $e->getMessage());
    		
   
    	}
    	Session::forget('cart');
    	return redirect()->route('product.index')->with('success','Successfully Purchased!');
    }
}
