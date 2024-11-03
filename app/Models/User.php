<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    public function followers()
    {
        return $this->morphMany(Follower::class, 'following')
        ->where('following_type', self::class);
    }

    public function isFollowedBy(User $user): bool
    {
        $isFollowing = Follower::query()
        ->where('following_type', self::class)
        ->where('following_id', $this->id)
        ->where('follower_id', $user->id)
        ->first();

        return ! empty($isFollowing);

        // return $this->followers()->where('follower_id', $user->id)->exists();
    }
}
