<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repairment extends Model
{
    protected $table = 'repairments';

    protected $fillable = ['code', 'issue_id','pic_id', 'action', 'is_completed'];

    public function pic()
    {
    	return $this->belongsTo('App\User', 'pic_id');
    }
}
