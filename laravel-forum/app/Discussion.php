<?php

namespace App;

use App\User;

use App\Reply;


class Discussion extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


    public function getRouteKeyName() //this function during route model binding use slug not id
    {
        return 'slug';
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class,'reply_id');
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);
    }
}
