<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;

class TweetService
{
    public function getTweets()
    {
        return Tweet::with('images')->orderby('created_at', 'DESC')->get();
    }

    //自分のtweetかどうかをチェックするメソッド
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet){
            return false;
        }

        return $tweet->user_id === $userId;
    }

    public function countYesterdayTweets(): int
    {
        return Tweet::whereDate('created_at', '>=',
        Carbon::yesterday()->toDateTimestring())
            ->whereDate('created_at', '<',
            Carbon::today()->toDateTimestring())
            ->count();
    }
}