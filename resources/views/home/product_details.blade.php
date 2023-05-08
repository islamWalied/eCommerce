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
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->


<div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto;padding:30px;width:50%;">
    <div class="box" style=" border:3px solid #0a0a0a">
        <div class="option_container">

        </div>

        <div class="img-box">
            <a href="/product/{{$products->image}}"><img style="width:100%;height:100%" src="product/{{$products->image}}" alt=""></a>
        </div>
        <div class="detail-box" style="padding: 20px;">
            <h5>
                {{$products->title}}
            </h5>
            @if($products->discount_price != null)
                <h5 style="color:red"> ${{$products->discount_price}}</h5>
                <h6 style="text-decoration:line-through; color:blue">
                    ${{$products->price}}
                </h6>
            @else
                <h4 style=" color:blue"> ${{$products->price}}</h4>


            @endif
            <h5>Product Category : {{$products->category}}</h5>
            <h5>Product Details : {{$products->description}}</h5>
            <h5>Available Quantity : {{$products->quantity}}</h5>

        </div>
    </div>

    <div style="text-align:center; padding-top:30px;"> <a href="{{url("/")}}" style="background-color:#17a2b8" type="button" class="btn btn-info">Return Back</a></div>

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
