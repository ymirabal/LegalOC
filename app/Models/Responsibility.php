<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    use HasFactory;
    protected $fillable=['worker_id','fact_id','entity_id','type','amount_affect','amount','date_notify','agreement','observ','status','approved','noEF'];

    //Relacion uno a muchos polimorfica

    public function appeals(){
        return $this->morphMany(Appeal::class,'appealable');
    }

    //Relacion uno a muchos polimorfica

    public function revisions(){
        return $this->morphMany(Revision::class,'revisionable');
    }

    //Relacion unos a muchos inversa
    public function worker(){
        $this->belongsTo(Worker::class);
    }

     //Relacion unos a muchos inversa

    public function entity(){
        return $this->belongsTo(Entity::class);
    }

}

