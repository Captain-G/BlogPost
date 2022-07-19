<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Blogs</title>
</head>
<body>
<div class="container-fluid">
    <div class="row" style="margin-top: 15px">
        @foreach($blogs as $blog)
            <div class="col col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xl-3">
                <div class="card" style="width: 18rem; margin-bottom: 15px; box-shadow: 5px 10px 18px royalblue;">
                    <img src="/storage/blogImages/{{$blog->blogImage}}" alt="nothing" height="150" width="250" style="margin: 20px;border-radius: 8px 35px">
                    <div class="card-body">
                        <button type="" class="btn btn-warning btn-sm">{{ $blog->blogGenre }}</button>
                        <h6 style="margin-top: 8px">{{ $blog->blogTitle }}</h6>
                        <div style="display: flex">
                            <img class="image-circle" src="/storage/profilePhotos/{{ $blog->user->profilePhoto  }}" alt="nothing" height="100px" width="75px" style="object-fit:contain; margin-right:10px">
                            <div>
                                <p id="username"> {{ $blog->user->name }}</p>
                                <p>{{ $blog->created_at }}</p>
                                <p>{{ $blog->readsCounts . " read(s)" }}</p>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex">
                                <form action="{{ route('readBlog', $blog->id) }}" method="post">
                                    @csrf
                                    <button type="submit" value="Read Blog" name="readBlog" class="btn btn-primary">Read Blog</button>
                                </form>
                                <form action="{{ route('deleteBlog', $blog->id) }}" method="post">
                                    @csrf
                                    <button type="submit" value="deleteBlog" name="deleteBlog" class="btn btn-danger" style="margin-left: 15px">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
