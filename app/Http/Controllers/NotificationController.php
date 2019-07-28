<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        // $user = auth()->user();
        // $user->readNotifications;
        // return $user;
        //return auth()->user()->readNotifications()->get();
        return [
            //'user' => auth()->user(),
            'readx' => auth()->user()->readNotifications,
            'unreadx' => auth()->user()->unreadNotifications
        ];
    }
}
