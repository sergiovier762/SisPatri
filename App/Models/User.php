<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;  
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Authorizable;

    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'usuario',
        'senha',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'usuario_verified_at' => 'datetime',
        ];
    }

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}