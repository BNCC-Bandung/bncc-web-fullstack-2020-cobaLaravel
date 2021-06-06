<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    public $timestamps = true;

    public function question(){
        return $this->belongsTo('App\Pertanyaan','pertanyaan_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
