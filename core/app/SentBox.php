<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentBox extends Model
{
    protected $table='sent_box';
    protected $fillable=['chat_id','name','username','message','datetime'];
    public $timestamps=false;
}
