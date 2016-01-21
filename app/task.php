<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class task extends Model
{
    protected $fillable = [
    //protected $guardedでもOK
        'task',
        'check',
        'published_at',
    ];

    public function setPublishedAtAttribute($date) {
        // published_atが呼ばれたとき分/まで指定
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    } 
}
