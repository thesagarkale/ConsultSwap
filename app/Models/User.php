<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function metadata(): HasMany
    {
        return $this->hasMany(UserMetadata::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function inductionComplete(): bool
    {
        return Auth::user()->metadata->filter(function ($item) {
                return $item->meta_key === 'induction' && $item->meta_value == true;
        })->count() > 0;
    }

    public function hasMetadata(string $key, int $user_id): bool
    {
        return User::find($user_id)->metadata->filter(function ($item) use ($key) {
                return $item->meta_key === $key;
        })->count() > 0;
    }
}
