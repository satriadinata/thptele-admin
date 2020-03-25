<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $table='replys';
    protected $fillable=['keycode','msg'];
    public $timestamps=false;
}
