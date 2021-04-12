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
}
