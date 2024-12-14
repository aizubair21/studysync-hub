<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_has_student extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'vendor',
        'user_id',
        'group_id',
        'status', //0, 9->active, 1->Processing, 2->under considering, 3->temp_banned, 4->schedule for banned forever
        'is_moderator',
        'moderator_until',
        'banned_until',
        'banned_as',
    ];


    //hidden from siarization
    protected $hidden =
    [
        'is_moderator',
        'status',
        'moderator_until',
        'banned_until',
        'banned_as'
    ];


    //field must be type casting
    protected $casts =
    [
        "created_at" => "datetime",
        "updated_at" => 'datetime',
    ];

    /**
     * remove method to remove a student with Group::removeStudent() static method
     * removeStudent() static method call a remove method belongs to students relatioship
     * static method removeStudents send an App\Model\User instance
     */
    public function remove(User $user)
    {
        return $this->student()->delete($user);
    }
}
