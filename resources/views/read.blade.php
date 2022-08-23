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
    <title>Read Blog</title>
    <style>
        .card {
            height: 379px;
            width: 300px;
            background: #808080;
            border-radius: 10px;
            transition: background 0.8s;
            overflow: hidden;
            box-shadow: 0 70px 63px -60px #000;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .card0 {
            background: url("/storage/blogImages/{{$newBlogItem->blogImage}}") left center no-repeat;
            background-size: 600px;
        }
        .card0:hover {
            background: url("/storage/blogImages/{{$newBlogItem->blogImage}}") center center no-repeat;
            background-size: 600px;
            transition-duration:2.5s;
        }
        .card1 {
            background: url("/storage/profilePhotos/{{  $newBlogItem->user->profilePhoto}}") center center no-repeat;
            background-size: 400px;
        }
        .card1:hover {
            background: url("/storage/profilePhotos/{{  $newBlogItem->user->profilePhoto}}") left center no-repeat;
            background-size: 600px;
            transition-duration:2.5s;
        }
        .hasButtons #btnLike:hover{
            background-color: #ff0202;
            color: white;
            transition: 1.5s;
        }
        .hasButtons #btnDislike:hover{
            background-color: #171616;
            color: white;
            transition: 1.5s;
        }
        .link{
            color: #000;
            text-decoration: none;
        }

        .link:hover{
            text-decoration: none;
            color: #000;
        }

        /*====================*/
        /* BUZZ OUT
        /*====================*/

        @-webkit-keyframes buzz-out-on-hover {
            10% {
                -webkit-transform: translateX(3px) rotate(2deg);
                transform: translateX(3px) rotate(2deg);
            }
            20% {
                -webkit-transform: translateX(-3px) rotate(-2deg);
                transform: translateX(-3px) rotate(-2deg);
            }
            30% {
                -webkit-transform: translateX(3px) rotate(2deg);
                transform: translateX(3px) rotate(2deg);
            }
            40% {
                -webkit-transform: translateX(-3px) rotate(-2deg);
                transform: translateX(-3px) rotate(-2deg);
            }
            50% {
                -webkit-transform: translateX(2px) rotate(1deg);
                transform: translateX(2px) rotate(1deg);
            }
            60% {
                -webkit-transform: translateX(-2px) rotate(-1deg);
                transform: translateX(-2px) rotate(-1deg);
            }
            70% {
                -webkit-transform: translateX(2px) rotate(1deg);
                transform: translateX(2px) rotate(1deg);
            }
            80% {
                -webkit-transform: translateX(-2px) rotate(-1deg);
                transform: translateX(-2px) rotate(-1deg);
            }
            90% {
                -webkit-transform: translateX(1px) rotate(0);
                transform: translateX(1px) rotate(0);
            }
            100% {
                -webkit-transform: translateX(-1px) rotate(0);
                transform: translateX(-1px) rotate(0);
            }
        }
        @keyframes buzz-out-on-hover {
            10% {
                -webkit-transform: translateX(3px) rotate(2deg);
                transform: translateX(3px) rotate(2deg);
            }
            20% {
                -webkit-transform: translateX(-3px) rotate(-2deg);
                transform: translateX(-3px) rotate(-2deg);
            }
            30% {
                -webkit-transform: translateX(3px) rotate(2deg);
                transform: translateX(3px) rotate(2deg);
            }
            40% {
                -webkit-transform: translateX(-3px) rotate(-2deg);
                transform: translateX(-3px) rotate(-2deg);
            }
            50% {
                -webkit-transform: translateX(2px) rotate(1deg);
                transform: translateX(2px) rotate(1deg);
            }
            60% {
                -webkit-transform: translateX(-2px) rotate(-1deg);
                transform: translateX(-2px) rotate(-1deg);
            }
            70% {
                -webkit-transform: translateX(2px) rotate(1deg);
                transform: translateX(2px) rotate(1deg);
            }
            80% {
                -webkit-transform: translateX(-2px) rotate(-1deg);
                transform: translateX(-2px) rotate(-1deg);
            }
            90% {
                -webkit-transform: translateX(1px) rotate(0);
                transform: translateX(1px) rotate(0);
            }
            100% {
                -webkit-transform: translateX(-1px) rotate(0);
                transform: translateX(-1px) rotate(0);
            }
        }
        .buzz-out-on-hover {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        }
        .buzz-out-on-hover:hover, .buzz-out-on-hover:focus, .buzz-out-on-hover:active {
            -webkit-animation-name: buzz-out-on-hover;
            animation-name: buzz-out-on-hover;
            -webkit-animation-duration: 2s;
            animation-duration: 2s;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
        }
        {{--<img src="/storage/blogImages/{{$newBlogItem->blogImage}}" alt="nothing" style="box-shadow: 5px 10px 18px 1px royalblue;margin-left:100px;max-height: 450px; max-width:450px;height: auto;width: auto">--}}
    </style>
</head>
<body>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div style="margin-left: 70px">
                <div class="container">
                    <div class="card card0">
                        <div class="border">
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-left: 70px; margin-top: 55px">
                <table class="table">
                    <tr>
                        <th scope="col">Username</th>
                        <td>{{ $newBlogItem->user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Followers</th>
                        <td>{{ $newBlogItem->user->followers }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Following</th>
                        <td>{{ $newBlogItem->user->following }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Posts</th>
                        <td>{{ $newBlogItem->user->posts }}</td>
                    </tr>
                </table>
                <div style="display: flex">
                <div>
                <form action="{{ route('followBlogger', $newBlogItem->id) }}" method="">
                    <button class="btn btn-primary btn-sm" style="margin-left: 45px" id="followButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        Follow
                    </button>
                </form>
                    <div class="row" style="margin-top: 30px; margin-left: 15px; display: flex">
                        <div>
{{--                            twitter--}}
                            <a href="https://twitter.com/?lang=en"  target=”_blank” class="link buzz-out-on-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1DA1F2" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </a>
                        </div>
                        <div>
                            {{--                            snapchat--}}
                            <a href="https://www.snapchat.com/"  target=”_blank” class="link buzz-out-on-hover"style="margin-left: 30px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="yellow" class="bi bi-snapchat" viewBox="0 0 16 16">
                                    <path d="M15.943 11.526c-.111-.303-.323-.465-.564-.599a1.416 1.416 0 0 0-.123-.064l-.219-.111c-.752-.399-1.339-.902-1.746-1.498a3.387 3.387 0 0 1-.3-.531c-.034-.1-.032-.156-.008-.207a.338.338 0 0 1 .097-.1c.129-.086.262-.173.352-.231.162-.104.289-.187.371-.245.309-.216.525-.446.66-.702a1.397 1.397 0 0 0 .069-1.16c-.205-.538-.713-.872-1.329-.872a1.829 1.829 0 0 0-.487.065c.006-.368-.002-.757-.035-1.139-.116-1.344-.587-2.048-1.077-2.61a4.294 4.294 0 0 0-1.095-.881C9.764.216 8.92 0 7.999 0c-.92 0-1.76.216-2.505.641-.412.232-.782.53-1.097.883-.49.562-.96 1.267-1.077 2.61-.033.382-.04.772-.036 1.138a1.83 1.83 0 0 0-.487-.065c-.615 0-1.124.335-1.328.873a1.398 1.398 0 0 0 .067 1.161c.136.256.352.486.66.701.082.058.21.14.371.246l.339.221a.38.38 0 0 1 .109.11c.026.053.027.11-.012.217a3.363 3.363 0 0 1-.295.52c-.398.583-.968 1.077-1.696 1.472-.385.204-.786.34-.955.8-.128.348-.044.743.28 1.075.119.125.257.23.409.31a4.43 4.43 0 0 0 1 .4.66.66 0 0 1 .202.09c.118.104.102.26.259.488.079.118.18.22.296.3.33.229.701.243 1.095.258.355.014.758.03 1.217.18.19.064.389.186.618.328.55.338 1.305.802 2.566.802 1.262 0 2.02-.466 2.576-.806.227-.14.424-.26.609-.321.46-.152.863-.168 1.218-.181.393-.015.764-.03 1.095-.258a1.14 1.14 0 0 0 .336-.368c.114-.192.11-.327.217-.42a.625.625 0 0 1 .19-.087 4.446 4.446 0 0 0 1.014-.404c.16-.087.306-.2.429-.336l.004-.005c.304-.325.38-.709.256-1.047Zm-1.121.602c-.684.378-1.139.337-1.493.565-.3.193-.122.61-.34.76-.269.186-1.061-.012-2.085.326-.845.279-1.384 1.082-2.903 1.082-1.519 0-2.045-.801-2.904-1.084-1.022-.338-1.816-.14-2.084-.325-.218-.15-.041-.568-.341-.761-.354-.228-.809-.187-1.492-.563-.436-.24-.189-.39-.044-.46 2.478-1.199 2.873-3.05 2.89-3.188.022-.166.045-.297-.138-.466-.177-.164-.962-.65-1.18-.802-.36-.252-.52-.503-.402-.812.082-.214.281-.295.49-.295a.93.93 0 0 1 .197.022c.396.086.78.285 1.002.338.027.007.054.01.082.011.118 0 .16-.06.152-.195-.026-.433-.087-1.277-.019-2.066.094-1.084.444-1.622.859-2.097.2-.229 1.137-1.22 2.93-1.22 1.792 0 2.732.987 2.931 1.215.416.475.766 1.013.859 2.098.068.788.009 1.632-.019 2.065-.01.142.034.195.152.195a.35.35 0 0 0 .082-.01c.222-.054.607-.253 1.002-.338a.912.912 0 0 1 .197-.023c.21 0 .409.082.49.295.117.309-.04.56-.401.812-.218.152-1.003.638-1.18.802-.184.169-.16.3-.139.466.018.14.413 1.991 2.89 3.189.147.073.394.222-.041.464Z"/>
                                </svg>
                            </a>
                        </div>
                        <div>
                            {{--                            whatsapp--}}
                            <a href="https://web.whatsapp.com/https://web.whatsapp.com/"  target=”_blank” class="link buzz-out-on-hover" style="margin-left: 30px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div style="margin-left: 70px">
                <div class="container">
                    <div class="card card1">
                        <div class="border">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
        <h3 style="text-align: center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
            </svg>
            {{ $newBlogItem->blogTitle }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
            </svg>
        </h3>
       <hr>
    <div class="container">
        <p>{{ $newBlogItem->blogContent }}</p>
    </div>
    <div class="container" style="margin-bottom: 40px; display: flex">
        <div style="margin-left: 100px">
            <form action="{{ route('likeBlog', $newBlogItem->id) }}" method="">
                <button class="btn btn-danger btn-sm" name="likeBlog" style="margin-left: 30px" type="submit" id="likebtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                    Like

{{--                   ajax syntax--}}


                </button>
            </form>
            <div style="margin-top: 15px;margin-left: 35px">
                @if($newBlogItem->no_of_likes == 0)
                    <p>No likes</p>
                @endif
                @if($newBlogItem->no_of_likes == 1)
                    <p>1 like</p>
                @endif
                @if($newBlogItem->no_of_likes > 1)
                    <p>{{ $newBlogItem->no_of_likes ." likes"}}</p>
                @endif
            </div>
        </div>
        <div style="margin-left: 400px">
            <a href="#" class="btn btn-sm btn-default" data-toggle="modal" data-target="#basicModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Comment
            </a>
            <div style="margin-top: 10px">
            <form action=" {{ route('commentSection', $newBlogItem->id) }}" method="get">
                <button class="btn btn-primary btn-sm">
                    Comment Section
                </button>
            </form>
            </div>
        </div>
            <!-- basic modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('addComment', $newBlogItem->id) }}" method="post">
                            @csrf
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Comment on this post. </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="commentSection">Type your Comments here: </label>
                                <textarea class="form-control" name="commentSection" id="commentSection" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
        <hr>
    </div>





    <!-- javascript links    -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
@endsection
