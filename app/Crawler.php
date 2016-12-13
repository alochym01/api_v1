<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    protected $fillable = ['en', 'vi', 'image', 'filmid', 'link', 'year', 'episode', 'episodeid', 'total', 'trailer', 'category', 'g_folder_id', 'source'];
}
