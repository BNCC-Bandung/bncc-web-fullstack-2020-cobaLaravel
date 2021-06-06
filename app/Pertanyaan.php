<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    public $timestamps = true;

    protected $fillable = [
        'judul','isi','profil_id','jawaban_tepat_id','created_at','updated_at'
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','question_tags','question_id','tag_id');
    }

    public function answer(){
        return $this->hasOne('App\Jawaban');
    }
}
