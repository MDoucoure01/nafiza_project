<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];


    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'bio',
        'date_born',
        'photo_profile',
        'id_unknown',
        'isActive',
        'phone',
        'pseudo',
        'sex'
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

    public function postLikes(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,"likeposts");
    }

    public function postComents(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,"commentposts")
        ->withPivot("content");
    }

    public function bibliothequeLike(): BelongsToMany
    {
        return $this->belongsToMany(Bibliotheque::class,"likebibliotheques");
    }

    public function bibliothequeComment(): BelongsToMany
    {
        return $this->belongsToMany(Bibliotheque::class,"commentbibliotheques")
        ->withPivot("content");
    }
}
