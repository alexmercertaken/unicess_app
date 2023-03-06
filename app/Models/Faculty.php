<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faculty extends Model
{
    use HasFactory;


    protected $fillable = ['name'];


    public function user(){

        return $this->hasMany(User::class);

    }



    // public function userFaculty() :HasOne
    // {
    //    return $this->hasOne(UserFaculty::class, 'faculty_id');
    // }
}
