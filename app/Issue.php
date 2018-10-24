<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';

    protected $fillable = ['code', 'item_id', 'reporter_id', 'description', 'pic_id', 'status', 'repairment_description'];

    //Define Item
    public function item()
    {
    	return $this->belongsTo('App\Item');
    }

    //Define reporter
    public function reporter()
    {
    	return $this->belongsTo('App\User', 'reporter_id');
    }

    //Define repairment
    public function repairment()
    {
        return $this->hasOne('App\Repairment');
    }

}
