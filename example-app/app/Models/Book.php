<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'name',
        'author',
        'publication_date',
        'description',
        'count'
    ];

    protected $casts = [
        'publication_date' => 'datetime',
    ];
}
