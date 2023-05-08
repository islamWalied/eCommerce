<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmails;
class AdminController extends Controller
{
    public function view_category(){
        if(Auth::id()){
            $cats = Category::all();
            return view("admin.category",compact('cats'));
        }
        else{
            return redirect('register');
        }

    }
    public function add_category(Request $request){
        $data = new category;
        $data->category_name =$request->category;
        $data->save();
        return redirect()->back()->with("add", "Category is added successfully");
    }
//    public function edit_category($id){
////        $cats = Category::find($id);
////        $cats->delete();
////        return redirect()->back()->with("delete", "The category is deleted successfully");
//        $cats = Category::find($id);
//        return view("admin.edit",compact('cats'));
//
//
//    }
    public function delete_category($id){
        $cats = Category::find($id);
        $cats->delete();
        return redirect()->back()->with("delete", "The category is deleted successfully");
    }
    public function add_product(Request $request){
        $product = new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->discount_price = $request->dic_price;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with("add", "The product is added successfully");

    }


    public function view_product(){
        if(Auth::id()){
            $category = category::all();
            return view("admin.product", compact('category'));
        }
        else{
            return redirect('register');
        }

    }

    public function show_product(){
        $products = product::all();
        return view("admin.show_product", compact('products'));
    }
    public function delete_product($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with("delete", "The product is deleted successfully");
    }
    public function edit_product($id){
        $category = category::all();
        $products = product::find($id);
        return view("admin.edit_product", compact('products','category'));
    }

    public function update_product(Request $request ,$id){
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->discount_price = $request->dic_price;

        $image = $request->image;
        if($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('product',$imagename);

            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with("edit", "The product is Updated successfully");
    }
    public function all_products(){
        $products = product::all();
        return view("home.all_products", compact('products'));
    }
    public function view_order(){
        $orders = order::all();
        return view("admin.order", compact('orders'));
    }
    public function approve_product($id){
        $order = order::find($id);
        $order->delivery_status = 'delivered';
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back();
    }


    public function print_pdf($id){

        $order = order::find($id);
        $pdf = PDF::loadView("admin.pdf",compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function send_email($id){
        $orders = order::find($id);
        return view("admin.send_email", compact('orders'));
    }
//    public function send_user_email(Request $request ,$id){
//        $orders = order::find($id);
//        $details = [
//            'greeting' => $request->greeting,
//            'firstline' => $request->firstline,
//            'body' => $request->body,
//            'button' => $request->button,
//            'url' => $request->url,
//            'lastline' => $request->lastline,
//        ];
//        Notification::send($orders, new SendEmails($details));
//        return redirect()->back();
//    }

    public function search(Request $request){
            $serachText = $request->search;
            $orders = order::where('name', 'LIKE', "%$serachText%")
                ->orWhere('phone', 'LIKE', "%$serachText%")
                ->orWhere('email', 'LIKE', "%$serachText%")
                ->orWhere('address', 'LIKE', "%$serachText%")
                ->orWhere('price', 'LIKE', "%$serachText%")
                ->orWhere('payment_status', 'LIKE', "%$serachText%")
                ->orWhere('delivery_status', 'LIKE', "%$serachText%")
                ->orWhere('product_title', 'LIKE', "%$serachText%")
                ->get();
            return view('admin.order',compact('orders'));
    }
}
