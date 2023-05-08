<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
<!-- font awesome style -->
<link href="home/css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="home/css/style.css" rel="stylesheet" />
<!-- responsive style -->
<link href="home/css/responsive.css" rel="stylesheet" />
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
                                <a href="{{url('product_details',$product->id)}}" class="option2">
                                    Product Details
                                </a>
                                <form method="POST" action="{{url('add_cart',$product->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width:100px">
                                        </div>

                                    <input class="option2" style="border-radius:20px" type="submit"  value="Add to cart" >
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{$product->image}}" alt="">
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
        <div style="text-align:center; padding-top:30px;"> <a href="{{url("all_products")}}" type="button" class="btn btn-info">View all Products</a>
    </div>
</section>
