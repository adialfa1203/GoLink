<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'is_banned',
        'google_id',
        'profile_picture',
        'verification_code',
        'github_id',
        'github_token',
        'github_refresh_token',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function shortUrls()
    {
        return $this->hasMany(ShortUrl::class);
    }
    public function totalVisits()
    {
        return $this->hasMany(ShortURLVisit::class);
    }

    public function ban() {
        $this->update(['is_banned' => true]);
    }

    public function unban() {
        $this->update(['is_banned' => false]);
    }
    public function Comment() {
        return $this->belongsTo(Comment::class);
    }
    // Dalam model User (app/Models/User.php)
    public function getProfilePictureAttribute()
    {
        // Gantilah 'profile_picture' dengan nama kolom yang sesuai di tabel pengguna.
        return $this->attributes['profile_picture'];
    }
    public function microsites()
    {
        return $this->hasMany(Microsite::class);
    }
    public function history()
    {
        return $this->hasMany(History::class);
    }
    public function sentMessages()
    {
        return $this->hasMany(ChMessage::class, 'from_id');
    }
    public function receivedMessages()
    {
        return $this->hasMany(ChMessage::class, 'to_id');
    }

}
