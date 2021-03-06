<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public $timestamps = false;

    public function questions(){
        return $this->belongsToMany('App\Pertanyaan','question_tags','tag_id','question_id');
    }
}
