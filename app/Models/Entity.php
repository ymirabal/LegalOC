<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $fillable=['name','external'];

    //Relacion uno a muchos
    public function disciplinary_actions(){
        return $this->hasMany(DisciplinaryAction::class);
    }

    public function responsibilities(){
        return $this->hasMany(Responsibility::class);
    }

    public function workers(){
        return $this->hasMany(Worker::class);
    }

}
