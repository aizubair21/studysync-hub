<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id", //
        'name', //
        'username', // username for vendor. can consider a academy, institute name
        'vendor', //vendor/teacher for their student account
        'email', //
        'password', //
        'phone', //
        'profile_photo_path', // storage photo path
        'profile_photo_url', //profile faker photo
        'nickname', //vendor or user can set their nicknames
        'subscription', // user subscription status
        'subscription_till', //  date till which the user is subscribed to our service
        'privilage', //0-> nothing, 1 -> active, 3 -> temporary banned, 4->banned on data, 2 -> draft
        'banned_on', // date when the user was banned
        "remember_token", // 
        'email_verified_at', //
        'temp_access_token',
        "is_verified_user", //custom varity user
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'two_factor_confirmed_at',
        'temp_access_token',
        'is_verified_user',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_verified_user' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];



    /**
     * all group belongs to users.
     * with the relation of third table 'group_has_student',
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, "group_has_students");
        // $this->belongsTo();
        // $this->belongsToMany();
    }

    /**
     * vendor has many groups
     */
    public function vendorGroups()
    {
        //get the group that related with vendor. group class have a collumn name 'vendor'.
        return $this->hasMany(Group::class, 'vendor')->orderBy("id", "desc");
        // return $this->groups()->wherePivot("vendor", Auth::id());
    }

    /**
     * vendor group with group member
     */
    public function  vendoreGroupsWithMembersCount()
    {
        return $this->vendorGroups()->withCount('students');
    }

    /**
     * get student by his/her id card number.
     *
     * @param int $cardNumber
     * @return Student|null
     */
    public static function findStudentByCard($cardNumber)
    {
        return self::where('cardnumber', $cardNumber)->first();
    }

    /**
     * vendor has many users
     */
    public function students()
    {
        //get all the user  who are related to this vendor
        return $this->hasMany(User::class, 'vendor')->orderBy("id", "desc");
    }

    /**
     * All exam schedules belongs to vendor 
     */
    public function schedules()
    {
        return $this->hasMany(group_has_exam::class, "vendor")->orderBy("id", "desc");
    }
}
