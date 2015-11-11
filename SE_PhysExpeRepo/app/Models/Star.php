<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    //
    protected $table = 'stars';
    protected $fillable = ['name','link','user_id','report_id'];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function report(){
        return $this->belongsTo('App\Models\Report','report_id','id');
    }
}
