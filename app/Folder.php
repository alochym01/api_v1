<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['folder_name', 'g_folder_id', 'filmid', 'source'];
}
