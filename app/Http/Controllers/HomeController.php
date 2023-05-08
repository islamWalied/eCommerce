<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reply;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index(){
        $products = product::paginate(6);
        $comments = comment::all();
        $replies = reply::all();
        return view("home.userpage",compact('products','comments','replies'));
    }

    public function redirect(){
        $status = Auth::user()->status;

        if($status == 1){
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_users = user::all()->count();
            $order =order::all();
            $total_revenue =0;
            foreach ($order as $orders){
                $total_revenue = $total_revenue +$orders->price;
            }
            $total_delivered =order::where('delivery_status','=','delivered')->get()->count();
            $payment_status =order::where('delivery_status','=','processing')->get()->count();

            return view("admin.home",compact('total_product',
                'total_order','total_users','total_revenue'
            ,'total_delivered',"payment_status"));
        }
        else{
            $products = product::all();
            $comments = comment::orderby('id','desc')->get();
            $replies = reply::all();

            return view("home.userpage", compact('products',"comments",'replies'));
        }
    }

    public function product_details($id){
        $products = product::find($id);
        return view("home.product_details", compact('products'));
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $product = product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;

            $cart->user_id =$user->id;
            $cart->product_title = $product->title;
            if($product->discount_price != null){
                $cart->price = $product->discount_price;
            }
            else{
                $cart->price = $product->price;

            }

            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        }
        else{

            return redirect('register');
        }
    }


    public function show_cart(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $carts = cart:: where('user_id','=',$id)->get();
            return view("home.show_cart",compact('carts',));
        }
        else{
            return redirect('register');
        }
    }

    public function remove_cart($id){
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash(){

        $user = Auth::User();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();
        foreach($data as $data){
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->price = $data->price;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_title = $data->product_title;
            $order->product_id = $data->Product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'We Have received Your Order. we will connect with you soon');
    }
    public function card($totalprice){
        return view('home.stripe', compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {




        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for U"
        ]);

        $user = Auth::User();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();
        foreach($data as $data){
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->price = $data->price;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_title = $data->product_title;
            $order->product_id = $data->Product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return redirect("/");
    }

    public function add_comment(Request $request){
        if(Auth::id()){
            $comment = new comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment= $request->comment;
            $comment->save();
            return redirect()->back();
        }else{
            return redirect('register');
        }
    }

    public function add_reply(Request $request){
        if(Auth::id()){
            $reply = new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id= $request->commentId;
            $reply->reply= $request->reply;
            $reply->save();
            return redirect()->back();
        }else{
            return redirect('register');
        }
    }
    public function about(){
        return view('home.about');
    }
//    public function testimonial(){
//        return view('home.testimonial');
//    }

}
