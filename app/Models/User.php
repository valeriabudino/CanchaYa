<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'password',
        'rol',
        'club_id',
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
    public const ROL_USER = 'user';
    public const ROL_ADMIN = 'admin';
    public const ROL_ADMIN_CLUB = 'admin_club';

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'rol' => 'string',
        ];
    }

    public function esAdmin(): bool
    {
        return $this->rol === self::ROL_ADMIN;
    }

    public function esAdminClub(): bool
    {
        return $this->rol === self::ROL_ADMIN_CLUB;
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function getHomeRoute(): string
    {
        return match ($this->rol) {
            self::ROL_ADMIN_CLUB => route('admin.panel', absolute: false),
            default => route('dashboard', absolute: false),
        };
    }
}
