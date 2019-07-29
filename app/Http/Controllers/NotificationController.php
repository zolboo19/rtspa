<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifications;
use App\Http\Resources\NotificationResource;

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
            'readx' => NotificationResource::collection(auth()->user()->readNotifications),
            'unreadx' => NotificationResource::collection(auth()->user()->unreadNotifications),
        ];
    }

    public function markAsRead(Request $request){
        auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
