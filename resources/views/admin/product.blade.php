


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
        .text-color{
            color:black
        }

        label{
            display:inline-block;
            width:200px;
        }
        .div-design{
            padding:15px;
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
            <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-center">
                    <h2 class="h2_font">Add Products</h2>
                    <div class="div-design">
                        <label>Product Title :</label>
                        <input class="text-color" type="text" name="title" placeholder="Write a title" required>
                    </div>
                    <div class="div-design">
                        <label>Product Descritpion :</label>
                        <input class="text-color" type="text" name="description" placeholder="Write a Descritpion" required>
                    </div>
                    <div class="div-design">
                        <label>Product Quantity :</label>
                        <input class="text-color" type="number" name="quantity" min ="0" placeholder="Write a Quantity" required>
                    </div>
                    <div class="div-design">
                        <label>Product Price :</label>
                        <input class="text-color" type="number" name="price" placeholder="Write a Price" required>
                    </div>
                    <div class="div-design">
                        <label>Discount Price :</label>
                        <input class="text-color" type="number" name="dic_price"  placeholder="Write a Discount Price" required> %
                    </div>
                    <div class="div-design">
                        <label>Product category :</label>
                        <select class="text-color" name="category">
                            <option  selected>Add A Category name</option>

                            @foreach($category as $cat)
                                <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="div-design">
                        <label>Product image :</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary " value="Add Product">
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





