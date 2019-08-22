@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="text-center">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @else
                    <div class="h3">ログインに成功しました！</div>
              @endif


                    <a href="{{ url('/')  }}">
                        <button type="button" class="btn btn-primary btn-lg">TOPに戻る</button>
                    </a>

            </div>
        </div>
    </div>
</div>
@endsection
