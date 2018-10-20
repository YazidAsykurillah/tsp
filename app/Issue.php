<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';

    protected $fillable = ['code', 'item_id', 'reporter_id', 'description', 'pic_id', 'status'];
}
