<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Todoリスト</title>
    <style>
        h2{
          position: relative;
          overflow: hidden;
          font-size:18px;
        }

        h2::before,h2::after{
          content: "";
          position: absolute;
          bottom: 0;
        }

        h2:before{
          border-bottom: 3px solid #4ba0b5;
          width: 100%;
        }

        h2:after{
          border-bottom: 3px solid #f2f2f2;
          width: 100%;
        }
    </style>
    </head>
      <header>
        <nav class="navbar navbar-expand navbar-white bg-info">
            <div class="container">
                <a class="navbar-brand text-white font-weight-bold" href="{{ url('/task')}}">MIZ-Todo</a>
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
                                          <a class="dropdown-item" href="{{ url('/timeline')}}">MIZ-SNS</a>
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
      <div class="container p-0">

      		@include('common.errors')

      		<!-- New Task Form -->
      		<form action="{{ url('task')  }}" method="POST" class="form-horizontal">
      		    {{ csrf_field() }}

      		    <!-- Task Name  -->

              <div class="form-group text-center" style="background-color: #E8F4FA;">
                  <input type="text" name="name" id="task-name" class="border rounded mx-2 my-4 px-3 py-2" style="width:70%" placeholder="タスクを追加してください">
                  <button type="submit" class="btn btn-primary p-2">追加</button>
              </div>
      		</form>

          @if(count($tasks) > 0)
          <table class="table table-striped text-center">
              <thead>
                  <th>やることリスト</th><th></th><th></th>
              </thead>
              <tbody>
                  @foreach($tasks as $task)
                      <tr>
                          <td class="table-text"><div>{{ $task->name }}</div></td>
                          <td>
                              <form action="{{ url('task/'.$task->id )}}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger">X</button>
                              </form>
                          </td>
                          <td></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          @endif


          <h2 class="mt-5 mb-3 pb-2">　全て達成したらここに行こう！</h2>

          <div id="map" class="w-100" style="height:400px;"></div>
    </div>

    <footer class="bg-info w-100 py-3 mt-5">
        <div class="text-white text-center small">© Naoto Segawa, 2019 All Rights Reserved.</div>
    </footer>


    <script>
        var map;
        var marker;
        var infoWindow;
        var center = {
          lat: 34.9570919,　//緯度
          lng: 138.3816472　//経度
        }
        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
          center: center,
          zoom: 18
          });

          marker = new google.maps.Marker({
            position:center,
            map:map
          });

          infoWindow = new google.maps.InfoWindow({
            content: '<div class="map">石橋うなぎ屋</div>'
          });

          marker.addListener('click',function(){
            infoWindow.open(map,marker);
          });
        }
    </script>
    <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCSPZv_Jv6M4EUYl55nX8PGvMNlv68neI4&callback=initMap" async defer></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
