<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'price',
        'created_by'
    ];

    public function images()
    {
        return $this->hasMany(Images::class, 'article_id');
    }
}
