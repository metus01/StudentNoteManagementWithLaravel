<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'fid_id',
        'mat_id',
        'credit',
        'masse_horaire'
    ];
}
