<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style type="text/css">
        .div-center{
            text-align:center;
            padding-top:40px;
        }
        .h2_font{
            font-size:40px;
            padding-bottom:40px;
        }
        .center{
            margin: 40px auto;
            width:80%;
            text-align:center;
            /*margin-top:20px;*/
            border:2px solid white;
        }
        .img{
            width:200px;
            height:200px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.side')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('add'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h2>{{session()->get('add')}}</h2>

                </div>
            @endif
            @if(session()->has('delete'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h2>{{session()->get('delete')}}</h2>

                </div>
            @endif
            <table class="center">
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Product Image</th>
                    <th>Controls</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->quantity}}</td>
                        <td><a href="/product/{{$product->image}}"> <img class="img"  src="/product/{{$product->image}}"></a></td>
                        <td><a href="{{url('delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{url('edit_product',$product->id)}}" class="btn btn-success">Edit</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.js')
</body>
</html>
