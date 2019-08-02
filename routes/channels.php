<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('likeChannel', function () {
    //dd(4);
    // DB::table('logs')->insert(
    //     [
    //         'name' => 'error',
    //         'body' => 'has error?'
    //     ]
    // );


    Log::debug('Зөв байна...');

    return true;
});
