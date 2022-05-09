<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    const NOT_DELETED = 0;
    protected $table = 'news';
    protected $fillable = [
        'id',
        'title',
        'content',
        'created_by',
        'updated_by'
    ];

}
