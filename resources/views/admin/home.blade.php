<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.side')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->
    @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.js')
</body>
</html>
