<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = ['name', 'embed_link', 'views'];
    protected $hidden = [];
    public $timestamps =false;
}
