<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosial extends Model
{
    use HasFactory;

    protected $guarded = [
        'sosial_id',
        'created_at',
        'updated_at'
    ];
}
