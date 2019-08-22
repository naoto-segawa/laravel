<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>MIZ-SNS</title>
    </head>
    <header>
      <nav class="navbar navbar-expand navbar-white bg-info">
          <div class="container">
              <a class="navbar-brand text-white font-weight-bold" href="{{ url('/timeline')}}">MIZ-SNS</a>
              <div class="collapse navbar-collapse">
                    <div class="mr-auto"></div>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu  dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/task')}}">MIZ-Todo</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/')}}">TOPに戻る</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    </ul>
              </div>
          </div>
        </nav>
    </header>
    <body style="background-color: #E6ECF0;">
        <div class="container bg-white p-0">

            <form action="/timeline" method="post">
            {{ csrf_field() }}
                <div class="text-center" style="background-color: #E8F4FA;">
                    <input type="text" name="tweet" class="border rounded mr-1 my-4 px-3 py-2" style="width:65%" placeholder="今どうしてる？">
                    <button type="submit" class="btn btn-primary p-2">ツイート</button>
                </div>
                @if($errors->first('tweet'))
                    <p class="text-danger px-0 py-3" style="font-size: 0.7rem;">※{{ $errors->first('tweet') }}</p>
                @endif
            </form>

            <div class="tweet-wrapper">
                @foreach($tweets as $tweet)
                <div class="border-bottom border-top p-4 ">
                    <div>{{ $tweet->tweet }}</div>
                </div>
                @endforeach
            </div>

        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
