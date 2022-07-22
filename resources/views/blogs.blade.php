<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Blogs</title>
    <style>
        .card:hover{
            background-color: #282727;
            transition: 1.5s ease-in-out;
            color: white;
        }
        .card .image1 img:hover{
            width: 200px;
            height: 180px;
            transition: 1s ease-in-out;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row" style="margin-top: 15px">
        @foreach($blogs as $blog)
            <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xl-2">
                <div class="card" style="width: 14rem; margin-bottom: 15px;box-shadow: 0 70px 63px -60px #000;">
                    <div class="image1">
                    <img src="/storage/blogImages/{{$blog->blogImage}}" alt="nothing" height="150" width="180" style="margin: 20px;border-radius: 8px 35px">
                    </div>
                        <div class="card-body">
                        <button type="" class="btn btn-warning btn-sm">{{ $blog->blogGenre }}</button>
                        <h6 style="margin-top: 8px">{{ $blog->blogTitle }}</h6>
                        <div style="display: flex">
                            <img class="rounded-circle" src="/storage/profilePhotos/{{ $blog->user->profilePhoto  }}" alt="nothing" height="100px" width="75px" style="object-fit:contain; margin-right:10px">
                            <div>
                                <p id="username"> {{ $blog->user->name }}</p>
                                <p>{{ $blog->created_at }}</p>
                                @if($blog->readsCounts == 0)
                                    <p>No reads yet</p>
                                @endif
                                @if($blog->readsCounts == 1)
                                    <p>1 read</p>
                                @endif
                                @if($blog->readsCounts > 1)
                                    <p>{{ $blog->readsCounts . " reads" }}</p>
                                @endif

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
                                    <button type="submit" value="deleteBlog" name="deleteBlog" class="btn btn-danger" style="margin-left: 15px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
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



