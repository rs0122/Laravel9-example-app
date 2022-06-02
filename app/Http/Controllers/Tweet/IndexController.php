<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
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
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        // TweetServiceのインスタンスを作成←依存性の注入により削除
        // $tweetService = new TweetService();
        // つぶやき一覧の取得
        $tweets = $tweetService->getTweets();
        dump($tweets);
        app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));
        // orderByとall()->sortByDesc()はSQL時のソートかPHPコードでのソートかで大きく違う。SQLでソートする方が高速。
        // $tweets = Tweet::all()->sortByDesc('created_at');
        // ↓Laravel独自のヘルパー関数。(dump,dieの頭文字)
        // dd($tweets);
        // return view('tweet.index', ['name' => 'laravel']);
        // 第二引数に指定する以外にもwith関数を使用する方法もある。
        return view('tweet.index')->with('tweets', $tweets);
    }
}
