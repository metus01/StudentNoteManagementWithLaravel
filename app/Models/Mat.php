<?php

namespace App\Models;

use App\Models\Fil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mat extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name'
    ];
    public function fils():BelongsToMany
    {
        return $this->belongsToMany(Fil::class);
    }
}
