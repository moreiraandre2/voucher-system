<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'discount',
        'often_used',
    ];
}
