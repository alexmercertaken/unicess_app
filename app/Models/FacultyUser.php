<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyUser extends Model
{
    use HasFactory;

    // protected $fillable = ['user_id', 'faculty_id'];

    // protected $table = 'faculty_user';


       // public function user() :BelongsToMany
    // {
    //     return $this->belongsToMany(User::class, 'user_id');
    // }



    // public function faculty() :BelongsToMany
    // {
    //     return $this->belongsToMany(Faculty::class, 'faculty_id');
    // }
}
