<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .title_deg{
            font-size:24px;
            text-align:center;
            display:inline
        }
        .center{
            margin: 40px auto;
            width:80%;
            text-align:center;
            /*margin-top:20px;*/
            border:2px solid white;
        }
        table tr{

            border:1px solid #656464;
        }
        table td{

            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.side')
    <!-- partial -->
    @include('admin.header')
    <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="title_deg">All Orders</h1>
            <div style="padding-left:400px;">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text"name="search"  style="color:black;border-radius:20px;" placeholder="Search for something">
                    <input type="submit"  value="Search" class="btn btn-lg btn-outline-primary">
                </form>
            </div>
            <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Product Title</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Controls</th>
                    <th>PDF</th>
{{--                    <th>Send Email</th>--}}
                </tr>
                @forelse($orders as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><a href="/product/{{$order->image}}"> <img class="img"  src="/product/{{$order->image}}"></a></td>
                        @if($order->delivery_status == 'processing')
                        <td><a href="{{url('approve_product',$order->id)}}" class="btn btn-info">Approve</a></td>
                        @else
                            <td><button disabled class="btn btn-info">Delivered</button></td>
{{--                            <td><p>Delivered</p></td>--}}
                        @endif
                        <td><a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a></td>
{{--                        <td><a href="{{url('send_email',$order->id)}}" class="btn btn-warning">Send Email</a></td>--}}

                    </tr>
                    @empty
                    <div>
                        <td colspan="16"><h1>No Data Found</h1></td>
                    </div>
                @endforelse

            </table>
        </h1>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.js')
</body>
</html>
