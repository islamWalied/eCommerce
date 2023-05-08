<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">
    @include('admin.css')
    <style>
        .title_deg{
            font-size:24px;
            text-align:center
        }
        .center{
            margin: 40px auto;
            width:80%;
            text-align:center;
            /*margin-top:20px;*/
            border:2px solid white;
        }
        form input{
            color:black
        }
        form label{width:200px;}
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
            <h2 class="title_deg">send email to {{$orders->email}}</h2>

            <form method="POST" action="{{url('send_user_email', $orders->id)}}">
                @csrf
                <div style="padding-left: 35%;padding-top: 30px;">
                    <label>Email Greeting :</label>
                    <input type="text" name="greeting">
                </div>
                <div style="padding-left: 35%;padding-top: 30px;">
                    <label>Email FirstLine :</label>
                    <input type="text" name="firstline">
                </div>
                <div style="padding-left: 35%;padding-top: 30px;">
                    <label>Email Body :</label>
                    <input type="text" name="body">
                </div>
                <div style="padding-left: 35%;padding-top: 30px;">
                    <label>Email Button Name :</label>
                    <input type="text" name="button">
                </div>
                <div style="padding-left: 35%;padding-top: 30px;">
                    <label>Email url :</label>
                    <input type="text" name="url">
                </div>
                <div style="padding-left: 35%;padding-top: 30px;">
                    <label>Email LastLine :</label>
                    <input type="text" name="lastline">
                </div>
                <div style="text-align :center;
                padding-top:20px;">
                    <input type="submit" class="btn btn-primary" value="send email">
                </div>
            </form>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.js')
</body>
</html>
