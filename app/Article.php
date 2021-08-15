<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['genre_id', 'judul', 'deskripsi', 'image', 'penulis'];
}
