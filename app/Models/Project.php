<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date', // Cast que garante que o start_date seja tratado como data
    ];
}
