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
            <div class="div-center">
                <h2 class="h2_font">Add category</h2>
                <form class="d-flex" action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input type="text" name="category" class=" input-1 form-control " placeholder="write category name">
                    <input type="submit" class = "btn btn-primary" name="submit" placeholder="Add Category">
                </form>
            </div>

            <table class="center">
                <tr>
                    <td>Category Name</td>
                    <td>Controls</td>
                </tr>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{$cat->category_name}}</td>
                        <td><a href="{{url('delete_category',$cat->id)}}" class="btn btn-danger">Delete</a>
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
