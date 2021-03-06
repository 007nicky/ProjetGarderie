<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatriceFormations extends Model
{
    use HasFactory;

    protected $fillable = [
        'educatrice_id',
        'description',
    ];

    //La formation est assigné à une educatrice
    public function educatrice()
    {
        return $this->belongsTo(Educatrice::class);
    }
}
