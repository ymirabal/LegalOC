<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Action extends Model
{
    use HasFactory;

    protected $fillable=['description'];

    //relacion uno a muchos

    public function disciplinary_actions(){
        return $this->hasMany(DisciplinaryAction::class);
    }

}
