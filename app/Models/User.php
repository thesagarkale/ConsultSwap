<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements ModelInterface
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'created_by');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'answered_by');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'from');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'to');
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

    public function getProfileUsername(): string
    {
        return '@' . $this->username;
    }

    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class, 'follower_id');
    }

    public function following(): HasMany
    {
        return $this->hasMany(Follower::class, 'user_id');
    }

    public function getFollowerUsers(): array
    {
        $followers = [];

        foreach ($this->followers as $follower) {
            $followers[] = $follower->user;
        }

        return $followers;
    }

    public function getFollowingUsers(): array
    {
        $followings = [];

        foreach ($this->following as $follower) {
            $followings[] = $follower->user;
        }

        return $followings;
    }
}
