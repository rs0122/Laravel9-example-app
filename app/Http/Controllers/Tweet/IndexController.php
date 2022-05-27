<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('tweet.index', ['name' => 'laravel']);
        // 第二引数に指定する以外にもwith関数を使用する方法もある。
        // return view('tweet.index')->with('name', 'laravel');
    }
}
