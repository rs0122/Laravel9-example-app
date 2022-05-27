<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        // orderByとall()->sortByDesc()はSQL時のソートかPHPコードでのソートかで大きく違う。SQLでソートする方が高速。
        // $tweets = Tweet::all()->sortByDesc('created_at');
        // ↓Laravel独自のヘルパー関数。(dump,dieの頭文字)
        // dd($tweets);
        // return view('tweet.index', ['name' => 'laravel']);
        // 第二引数に指定する以外にもwith関数を使用する方法もある。
        return view('tweet.index')->with('tweets', $tweets);
    }
}
