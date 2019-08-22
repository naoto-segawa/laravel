<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \App\Tweet;

class TimelineController extends Controller
{
    public function showTimelinePage(){
      $tweets = Tweet::latest()->get();
      return view('auth.timeline',compact('tweets'));
    }

    public function postTweet(Request $request){
      $validator = $request->validate([
        'tweet' => ['required','string','max:280'],
      ]);
      Tweet::create([
        'user_id' => Auth::user()->id,
        'tweet' => $request->tweet,
      ]);

      return back();
    }
}
