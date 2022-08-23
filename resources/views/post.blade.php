@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Post Blog</title>
</head>
<body>

<div class="container">
    <div class="card" style="box-shadow: 5px 10px 18px royalblue;">
        <div class="card-body">
            <form method="post" action="{{ route('post') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="blogTitle">Blog Title :</label>
                    <input type="text" class="form-control" id="blogTitle" name="blogTitle">
                </div>
                <div class="form-group">
                    <label for="blogImage">Select your blog's cover photo :</label>
                    <input type="file" class="form-control-file" id="blogImage" name="blogImage">
                </div>
                <div class="form-group">
                    <label for="blogGenre">Blog genre</label>
                    <select name="blogGenre" class="form-control" id="blogGenre">
                        <option value="Personal">Personal blog</option>
                        <option value="Business">Business/Corporate</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Travel">Travel</option>
                        <option value="Politics">Politics</option>
                        <option value="Food">Food</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="News">News</option>
                        <option value="Fitness">Fitness</option>
                        <option value="DIY">DIY</option>
                        <option value="Sports">Sports</option>
                        <option value="Parenting">Parenting</option>
                        <option value="Automobiles">Automobiles</option>
                        <option value="Pets">Pets</option>
                        <option value="Gaming">Gaming</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="blogContent">Write down your blog's content below :</label>
                    <textarea class="form-control" id="blogContent" rows="7" name="blogContent"></textarea>
                </div>
                <input class="btn btn-primary" type="submit" value="Post" name="post" style="margin-left:500px ">
            </form>
        </div>
    </div>


</div>


</body>
</html>
@endsection
