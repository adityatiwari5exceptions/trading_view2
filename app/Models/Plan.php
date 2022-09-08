<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // use HasFactory;
    protected $fillable = ['plan_name','billing_method','interval_count','price','currency'];

}
