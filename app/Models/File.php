<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'object_id',
        'object_type',
        'original_name',
        'file_name',
    ];
}
