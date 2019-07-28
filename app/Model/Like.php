<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'reply_id'];
    //protected $guarded = [];
    public function reply(){
        return $this->belongsTo(Reply::class);
    }
}
