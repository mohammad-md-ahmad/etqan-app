<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'follower_id',
        'following_type',
        'following_id',
        'followed_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'followed_at' => 'datetime',
        ];
    }

    public function follower()
    {
        return $this->belongsTo(User::class);
    }

    public function following()
    {
        return $this->morphTo();
    }
}
