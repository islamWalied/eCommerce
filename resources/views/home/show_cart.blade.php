<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
        .center{
            margin:auto;
            text-align:center;
            padding:30px;
        }
        table,th,td{
            border:1px solid gray;
        }
        table tr th{
            font-size:30px;
            padding:5px
        }
        table img{
            width:200px;
            height:200px;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->


    <div class="center">

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h2>{{session()->get('message')}}</h2>

            </div>
        @endif
        <table>
            <tr>
                <th>Product Title</th>
                <th>Product quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php $totalprice = 0 ?>
            @foreach($carts as $cart)

                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price * $cart->quantity }}</td>
                    <td><img src="/product/{{$cart->image}}"></td>
                    <td><a href="{{url('remove_cart',$cart->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                    <?php $totalprice = $totalprice + $cart->price * $cart->quantity ?>
            @endforeach

        </table>

        <div >
            <h4 style="font-size:30px; padding-top:20px">Total Price: ${{$totalprice}}</h4>
        </div>
        <div style="padding-top:20px;">
            <h2 style="font-size:30px">Proceed to Order </h2>
            <a href="{{url('cash')}}" class="btn btn-danger">Cash on Delivery</a>
            <a href="{{url('card', $totalprice)}}" class="btn btn-danger">Pay Using Card</a>
        </div>
    </div>

<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
