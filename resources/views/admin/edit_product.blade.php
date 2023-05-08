<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">
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
        .text-color{
            color:black
        }

        label{
            display:inline-block;
            width:200px;
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

            @if(session()->has('edit'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h2>{{session()->get('edit')}}</h2>

                </div>
            @endif
            <form action="{{url('/update_product',$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-center">
                    <h2 class="h2_font">Add Products</h2>
                    <div class="div-design">
                        <label>Product Title :</label>
                        <input class="text-color" type="text" value="{{$products->title}}" name="title" placeholder="Write a title" required>
                    </div>
                    <div class="div-design">
                        <label>Product Descritpion :</label>
                        <input class="text-color" type="text" value="{{$products->description}}" name="description" placeholder="Write a Descritpion" required>
                    </div>
                    <div class="div-design">
                        <label>Product Quantity :</label>
                        <input class="text-color" type="number" value="{{$products->quantity}}" name="quantity" min ="0" placeholder="Write a Quantity" required>
                    </div>
                    <div class="div-design">
                        <label>Product Price :</label>
                        <input class="text-color" type="number" value="{{$products->price}}" name="price" placeholder="Write a Price" required>
                    </div>
                    <div class="div-design">
                        <label>Discount Price :</label>
                        <input class="text-color" type="number" value="{{$products->discount_price}}" name="dic_price"  placeholder="Write a Discount Price" required> %
                    </div>
                    <div class="div-design">
                        <label>Product category :</label>
                        <select class="text-color" name="category">
                            <option value="" selected>{{$products->category}} </option>
                            @foreach($category as $cat)
                                <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div-design">
                        <label>Product image :</label>
                        <a href="/product/{{$products->image}}"><img class="img" src="/product/{{$products->image}}"></a>
                    </div>
                    <div class="div-design">
                        <label>Product image :</label>
                        <input type="file" name="image">
                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary " value="Edit Product">
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.js')
</body>
</html>





