<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        // Relationships
        
    public function receivedServices()
    {
        return $this->hasMany(Service::class, 'received_by');
    }

    public function technicianServices()
    {
        return $this->hasMany(Service::class, 'technician_id');
    }

    public function closedServices()
    {
        return $this->hasMany(Service::class, 'closed_by');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    //Accessors 
    
    public function getTitleAttribute(): string
    {
    $role = $this->roles->first()?->name ?? 'No Role';
    return "{$this->name} ({$role})";
    }
}