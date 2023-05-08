
<!-- Basic -->
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

<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    {{$product->category}}
                                </a>

                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img style="width:200px;height:200px;" src="product/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$product->title}}
                            </h5>
                            @if($product->discount_price != null)
                                <h5 style="color:red"> ${{$product->discount_price}}</h5>
                                <h6 style="text-decoration:line-through; color:blue">
                                    ${{$product->price}}
                                </h6>
                            @else
                                <h4 style=" color:blue"> ${{$product->price}}</h4>


                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div style="text-align:center; padding-top:30px;"> <a href="{{url("/")}}" type="button" style="background-color:#17a2b8" class="btn btn-info">Return Back</a>

    </div>

</section>

