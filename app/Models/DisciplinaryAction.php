<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaryAction extends Model
{
    use HasFactory;
    protected $fillable=['worker_id','fact_id','action_id','entity_id','date_notify','date_ejecution','time_rehab','observ','status','approved','noEF'];

    //Relacion uno a muchos polimorfica

    public function appeals(){
        return $this->morphMany(Appeal::class,'appealable');
    }

     //Relacion uno a muchos polimorfica

     public function revisions(){
        return $this->morphMany(Revision::class,'revisionable');
    }

    //Relacion uno a mucho inverse
    public function action(){
        return $this->belongsTo(Action::class);
    }

    //Relacion uno a mucho inverse
    public function fact(){
        return $this->belongsTo(Fact::class);
    }

    //Relacion uno a mucho inverse
    public function Worker(){
        return $this->belongsTo(Worker::class);
    }
    //Relacion uno a mucho inverse
    public function entity(){
        return $this->belongsTo(Entity::class);
    }







}
