<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html,body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                padding : 50px;
                scroll-behavior: smooth;
            }


            .links > a {
                color: #636b6f;
                padding: 10px 25px;
                margin-bottom: 5px;
                border: 1px solid black;
                font-size: 15px;
                border-radius: 10px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                display: block
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            ul {
                display: flex;
                margin-bottom: 40px;
                position: fixed;
                background: grey;
                width: 100%;
                left: 0;
                padding: 20px;
                top: 0;
                margin-top: 0;
            }
            li {
                list-style-type: none;
                margin-right: 20px;
            }
            li a {
                color: #fff;
                text-decoration: none;
                font-size: 18px;
            }
            .press-block{
                padding-top: 50px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <ul>
                <li><a href="#netgazeti">ნეტგაზეთი</a></li>
                <li><a href="#onge">on.ge</a></li>
                <li><a href="#tavisufleba">თავისუფლება</a></li>
                <li><a href="#ipn">ipn</a></li>
                <li><a href="#tv">1TV</a></li>
            </ul>
            <div class="content">
                
                <div id="netgazeti" class="press-block">
                    <h1>ნეტგაზეთი</h1>
                    <div class="links">
                        @if($netgazeti)
                            @foreach($netgazeti as $net)
                                <a href="{{$net->href}}" target="_blank">{{$net->title}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div id="onge" class="press-block">
                    <h1>ON.GE</h1>
                    <div class="links">
                        @if($onge)
                            @foreach($onge as $net)
                                <a href="{{$net->href}}" target="_blank">{{$net->title}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div id="tavisufleba" class="press-block">
                    <h1>რადიო თავისუფლება</h1>
                    <div class="links">
                        @if($radio)
                            @foreach($radio as $net)
                                <a href="https://www.radiotavisupleba.ge{{$net->href}}" target="_blank">{{$net->title}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div id="ipn" class="press-block">
                    <h1>IPN</h1>
                    <div class="links">
                        @if($ipn)
                            @foreach($ipn as $net)
                                <a href="https://www.interpressnews.ge/ka/{{$net->url}}" target="_blank">{{$net->title}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div id="tv" class="press-block">
                    <h1>1TV</h1>
                    <div class="links">
                        @if($public)
                            @foreach($public as $net)
                                <a href="{{$net->post_permalink}}" target="_blank">{{$net->post_title}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
