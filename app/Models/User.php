<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable, HasRoles;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
=======
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
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
<<<<<<< HEAD

     public function student()
     {
         return $this->hasOne(Student::class);
     }
=======
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d


    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
<<<<<<< HEAD
    ];

    protected $guarded = [
        'id'
    ];

    // protected $attributes = [
    //     'conseil_id' => null,
    //     'date_born' => null,
    //     'specific_desease' => null,
    //     'allergies' => null,
    // ];
=======
        'bio',
        'date_born',
        'photo_profile',
        'id_unknown',
        'isActive',
        'phone',
        'pseudo',
        'sex'
    ];


>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
<<<<<<< HEAD
        'two_factor_recovery_codes',
        'two_factor_secret',
=======
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
<<<<<<< HEAD
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
=======
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
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
}
