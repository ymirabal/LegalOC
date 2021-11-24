<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable=['clause', 'amount', 'date_ini', 'date_top', 'date_answer', 'penalty', 'final_status', 'date_concil', 'no_state', 'date_ec', 'date_tpp', 'date_rad', 'decision', 'observ', 'cpc', 'entityC_id', 'entityR_id', 'concept_id', 'product_id', 'pretension_id', 'worker_id','type', 'approved','amountpaid'];
}
