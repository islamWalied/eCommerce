<!DOCTYPE html>
<html>
<head>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
</div>
<!-- why section -->
@include('home.why')
<!-- end why section -->

<!-- arrival section -->
@include('home.arrival')
<!-- end arrival section -->

<!-- product section -->
@include('home.product')
<!-- end product section -->

{{--start comment section--}}

<div style="text-align:center;">
    <h1 style="font-size:30px;text-align:center;padding-top:30px;padding-bottom:30px;">Comments</h1>
    <form method="POST" action="{{url('add_comment')}}">
        @csrf
        <textarea style="height:150px;
        width:600px;" name="comment" placeholder="Write your comment here"></textarea>
        <br>
        <input type="submit" value="Save Comment" class="btn btn-primary">
    </form>

</div>
<div style="padding-left:20%;">
    <h1 style="font-size:30px;padding-top:30px;padding-bottom:20px;">All Comments</h1>
    @foreach($comments as $comment)
        <div style="padding-bottom:10px;">
            <b>{{$comment->name}}</b>
            <p style="margin-bottom:0"> {{$comment->comment}}</p>
            <a href="javascript::void(0);" onclick="reply(this)"  data-Commentid="{{$comment->id}}">Reply</a>
            @foreach($replies as $reply)
                @if($reply->comment_id==$comment->id)
            <div style="padding-left:5%; padding-bottom:10px;">
                <b>{{$reply->name}}</b>
                <p>{{$reply->reply}}</p>
            </div>
                @endif
            @endforeach
        </div>


    @endforeach
{{--reply text box--}}
    <div style="display:none" class="replyDiv">

        <form action="{{url('add_reply')}}" method="POST">
            @csrf
                <input type="text" id="commentId" name="commentId"hidden >
                <textarea style="height:100px; width:300px;" name="reply" placeholder="write something here"></textarea>
            <button type="submit" class="btn btn-primary">Reply</button>
                <a href="javascript::void(0);" class="btn btn-primary" onclick="reply_close(this)">Close</a>

        </form>
    </div>
</div>
{{--    end reply--}}
{{--end comment section--}}
<!-- subscribe section -->
@include('home.subscribe')
<!-- end subscribe section -->
<!-- client section -->
@include('home.client')
<!-- end client section -->
<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<script>
    function reply(caller){
        document.getElementById('commentId').value=$(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }
    function reply_close(){
        $('.replyDiv').hide();
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
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
