<?php

namespace App\Models;

use App\Models\Mat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fil extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name'
    ];

    public function mats():BelongsToMany
    {
        return $this->belongsToMany(Mat::class);
    }
    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
