<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
        protected $fillable = [
        'name',
        'color',
        'is_active',
    ];

        // Relationships

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

            // Accessors
      public function getDisplayNameAttribute(): string
    {
        return match ($this->name)
        {
            'received' => 'Recibido',
            'diagnosing' => 'En Diagnóstico',
            'waiting_customer' => 'Esperando respuesta del cliente',
            'approved' => 'Aprobado',
            'in_progress' => 'En Progreso',
            'ready_for_pickup' => 'Listo para recoger',
            'delivered' => 'Entregado',
            'canceled' => 'Cancelado',
            default => $this->name,

        };
    }

    //Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}