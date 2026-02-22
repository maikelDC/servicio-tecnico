<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Client extends Model
{
      use SoftDeletes;

    protected $fillable = [
        'name',
        'document_id',
        'phone',
        'email',
        'address',
        'notes',
    ];

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    protected function phone(): Attribute
{
    return Attribute::make(
        // Si por algún error llega algo con letras o espacios, 
        // conservamos solo números y el símbolo +
        set: fn ($value) => $value ? preg_replace('/[^0-9+]/', '', $value) : null,
    );
}
}
