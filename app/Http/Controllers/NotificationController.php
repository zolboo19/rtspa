<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return [
            //'user' => auth()->user(),
            'readx' => auth()->user()->readNotifications,
            'unreadx' => auth()->user()->unreadNotifications,
        ];
    }
}
