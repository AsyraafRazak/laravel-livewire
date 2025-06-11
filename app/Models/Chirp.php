<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    protected $fillable = [
        'message',
    ];
}
