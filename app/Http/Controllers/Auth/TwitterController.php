<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwitterController extends Controller
{
  // 投稿
  public function tweet(Request $request)
  {
　　　　　　　　　　　　　　　　$twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
          env('TWITTER_CLIENT_SECRET'),
          env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
          env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

      $twitter->post("statuses/update", [
          "status" =>
              'New Photo Post!' . PHP_EOL .
              '新しい聖地の写真が投稿されました!' . PHP_EOL .
              'タイトル「' . $title . '」' . PHP_EOL .
              '#photo #anime #photography #アニメ #聖地 #写真 #HolyPlacePhoto' . PHP_EOL .
              'https://www.holy-place-photo.com/photos/' . $id
      ]);
  }
}
