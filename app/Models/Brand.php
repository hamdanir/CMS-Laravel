<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the comments for the Brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Type(): HasMany
    {
        return $this->hasMany(Type::class, 'codeBrand', 'id');
    }
}
