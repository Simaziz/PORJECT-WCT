<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Job;
use App\Models\Follow;

class User extends Authenticatable
{
    public function isEmployer(): bool
{
    return $this->role === 'employer';
}

    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',   // optional
        'status',
        'user_id' // optional
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /**
     * The jobs this user has favorited.
     *
     * @return BelongsToMany
     */
    // public function favorites(): BelongsToMany
    // {
    //     return $this->belongsToMany(Job::class, 'favorites')->withTimestamps();
    // }




    /**
     * The follows created by the user.
     *
     * @return HasMany
     */
    public function follows(): HasMany
    {
        return $this->hasMany(Follow::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'favorites')->withTimestamps();
    }
}
