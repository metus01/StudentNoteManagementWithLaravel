<?php

namespace App\Models;

use App\Models\Mat;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'note'
    ];
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function year() :BelongsTo
    {
        return $this->belongsTo(Year::class);
    }
    public function mat() :BelongsTo
    {
        return $this->belongsTo(Mat::class);
    }
}
