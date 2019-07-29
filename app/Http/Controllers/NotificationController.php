<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifications;

class NotificationController extends Controller
{


    public function index(){
        //$user = auth()->user();
        // $user->readNotifications;
        // return $user;
        //return auth()->user()->readNotifications()->get();
        return [
            //'user' => auth()->user(),
            //'noti' => auth()->user()->notifications,
            //'readx' => auth()->user()->readNotifications,
            'unreadx' => auth()->user()->unreadNotifications,
        ];
    }

    public function markAsRead(Request $request){
        auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
