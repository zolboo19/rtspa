<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;
use App\Events\LikeEvent;

class LikeController extends Controller
{
    public function likeIt(Reply $reply){
        $reply->like()->create([
            'user_id' => auth()->id(),
            //'user_id' => '1'
        ]);
        broadcast(new LikeEvent($reply->id, 1))->toOthers();
        //broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }
    public function unlikeIt(Reply $reply){
        $reply->like()->where('user_id', auth()->id())->first()->delete();
        //$reply->like()->where('user_id', '1')->delete();
        broadcast(new LikeEvent($reply->id, 0))->toOthers();
    }
}
