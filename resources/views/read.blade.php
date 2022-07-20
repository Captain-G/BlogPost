<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Read Blog</title>
</head>
<body>
    <div class="container-fluid" style="margin-top: 20px">
        <div class="row">
            <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xl-6">
                <div style="width: 24rem;height: 300px">
{{--                    <p>/storage/blogImages/{{$newBlogItem->blogImage}}</p>--}}
                 <img src="/storage/blogImages/{{$newBlogItem->blogImage}}" alt="nothing" style="box-shadow: 5px 10px 18px 1px royalblue;margin-left:100px;max-height: 450px; max-width:450px;height: auto;width: auto">
                </div>
            </div>
            <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xl-6">
                <div class="card" style="width: 24rem; height: 300px;box-shadow: 5px 10px 18px royalblue;">
{{--                    <p>/storage/profilePhotos{{  $newBlogItem->user->profilePhoto}}</p>--}}
                    <img class="rounded-circle" src="/storage/profilePhotos/{{  $newBlogItem->user->profilePhoto}}" alt="nothing" height="150" width="150" style="max-width: 200px; margin: auto">
                    <div style="display: flex">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col"><a href="" style="color: black">Followers</a></th>
                                <th scope="col"><a href="" style="color: black">Following</a></th>
                                <th scope="col"><a href="" style="color: black">Posts</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">{{ $newBlogItem->user->name }}</th>
                                <td>{{ $newBlogItem->user->followers}}</td>
                                <td>{{ $newBlogItem->user->following }}</td>
                                <td>{{ $newBlogItem->user->posts }}</td>
                            </tr>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
        <h3 style="text-align: center">{{ $newBlogItem->blogTitle }}</h3>
    <hr>
    <div class="container">
        <p>{{ $newBlogItem->blogContent }}</p>
    </div>


</body>
</html>
