<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostList extends Model
{
    use SoftDeletes;
    
    //protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'task',
        'start_time',
        'finish_time'
    ];
}