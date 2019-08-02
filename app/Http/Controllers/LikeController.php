<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;
use App\Events\LikeEvent;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function likeIt(Reply $reply){

        $reply->like()->create([
            'user_id' => auth()->id(),
            //'user_id' => '1'
        ]);
        // DB::table('logs')->insert(
        //     [
        //         'name' => 'error',
        //         'body' => 'has error?'
        //     ]
        // );
        broadcast(new LikeEvent($reply->id, 1))->toOthers();
        //dd($reply);
        //broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }
    public function unlikeIt(Reply $reply){
        $reply->like()->where('user_id', auth()->id())->first()->delete();
        //$reply->like()->where('user_id', '1')->delete();

        broadcast(new LikeEvent($reply->id, 0))->toOthers();
        //dd(2);
    }
}
