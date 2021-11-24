<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected $fillable=['date', 'result', 'type', 'observ', 'appealable_id', 'appealable_type'];
   

    public function appealable(){
        return $this->morphTo();
    }







}
