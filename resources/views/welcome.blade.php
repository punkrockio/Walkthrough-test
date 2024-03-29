<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"> My Blog </div> 
                <p> 
                    @if(isset($_COOKIE['email']))
                        <a href="authour/logout">Logout</a>
                        <br>
                        <a href="post/create">Create a post</a>
                    @else
                        <a href="authour/login">Login</a>
                        <br>
                        <a href="authour/create">Create an account</a>
                    @endif

                </p>
                <ul>
                    @foreach($posts as $post)
                        <li> 
                            <a href="post/{{$post->id}}">{{$post->title}} </a> 
                        </li>
                    @endforeach


                </ul>    

                <p><a href="authour">Authours</a></p>

                

            </div>
        </div>
    </body>
</html>
