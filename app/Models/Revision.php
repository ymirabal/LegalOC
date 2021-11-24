<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $fillable=['date', 'result', 'observ', 'revisionable_id', 'revisionable_type'];

    public function appealable(){
        return $this->morphTo();
    }


}
