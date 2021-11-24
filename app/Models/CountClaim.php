<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountClaim extends Model
{
    use HasFactory;
    protected $fillable=['amount', 'amount_ini', 'date_ini', 'date_top', 'date_answer', 'approved', 'date_concil', 'amountpaid', 'no_ec', 'date_ec', 'observ', 'entity_id', 'worker_id'];
}
