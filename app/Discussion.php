<?php

namespace App;

use App\Channel;
use App\Notifications\ReplyMarkedAsBestReply;


class Discussion extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function scopeFilterByChannels($builder)
    {
        if(request()->query('channel')){
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if($channel){
                return $builder->where('channel_id', $channel->id);
            }

            return $builder;
        }

        return $builder;
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);
        
        if($reply->user->id === $this->user->id){
            return;
        }
        $reply->user->notify(new ReplyMarkedAsBestReply($reply->discussion));
    }
}
