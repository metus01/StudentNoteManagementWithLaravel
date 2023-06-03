<?php

namespace App\Models;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'name',
        'observations'
    ];
    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
    public function notes() : HasMany
    {
        return $this->hasMany(Note::class);
    }
}
