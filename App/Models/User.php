<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'usuario',
        'senha',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
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
            'usuario_verified_at' => 'datetime',
        ];
    }

    /**
     * Set the user's password.
     *
     * @param string $value
     * @return void
     */
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
        $this->attributes['senha'] = $value;
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}