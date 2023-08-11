<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['nameType', 'codeBrand', 'nameBrand'];
    public $timestamps = false;
    
    public function Brand(): HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'codeBrand');
    }
}
