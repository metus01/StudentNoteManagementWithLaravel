<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilMatLink extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'fil_id',
        'mat_id',
        'credit',
        'masse_horaire'
    ];
    public function fil():BelongsTo
    {
        return $this->belongsTo(Fil::class);
    }
    public function mat():BelongsTo
    {
        return $this->belongsTo(Mat::class);
    }
    public function getMatName()
    {
        $mat_id = $this->mat_id;
        $mat_name = Mat::find($mat_id)->name;
        return $mat_name;
    }
    public function getFilName()
    {
        $fil_id = $this->fil_id;
        $fil_name = Fil::find($fil_id)->name;
        return $fil_name;
    }
}
