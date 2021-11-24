<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname', 'job','entity_id','area_id'
    ];

    //Relacion uno a muchos
    public function disciplinary_actions(){
        return $this->hasMany(DisciplinaryAction::class);
    }

    //Relacion uno a muchos
    public function responsibilities(){
        return $this->hasMany(Responsibility::class);
    }

    //Relacion uno a muchos inversa

    function entity(){
        $this->belongsTo(Entity::class);
    }


    

}
