<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='message';
    protected $fillable=['username','chat_id','text','date','firstname'];
    public $timestamps=false;
}
