<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FuelType extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable = ['name'];





    public function cars():HasMany
    {
       return $this->hasMany(Car::class);
    }

}
