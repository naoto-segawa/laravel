<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>M･I･Z</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('img/MV1.jpg');
                background-size:cover;
                background-position: center center;
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
                height: 100%;
            }

            .section {
              position: relative;
            }

            .subject {
              position: absolute;
              top: 0;
              right: 0;
              bottom: 0;
              left: 0;
              margin: auto;
              width: 80%;
              height: 40%;
            }

            .title {
                font-size: 84px;
            }

            .content {
                text-align: center;
            }

            .links {
              color: white;
              font-size: 14px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-align: center;
            }

            .links p {
              margin-top: 30px;
            }

            .textlink {
              color:white;
              font-size: 14px;
            }

            .link {
                color: white;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border: 1px solid white;
                padding: 12px 16px;
            }

            .link-mr {
              display: inline-block;
              margin-top: 30px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="section">
        <div class="subject">
          <div class="content">
              <div class="title m-b-md">
                  M･I･Z
              </div>
          </div>

            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('timeline')}}" class="link">MIZ-SNS</a><br>
                        <a href="{{ url('task')}}" class="link link-mr">Todoリスト</a>
                    @else
                        <a href="{{ route('login') }}" class="link">ログイン</a><br>
                        <p>新規会員登録は<a href="{{ route('register') }}" class="textlink">こちら</a></p>
                    @endauth
                </div>
            @endif


        </div>
    </body>
</html>
