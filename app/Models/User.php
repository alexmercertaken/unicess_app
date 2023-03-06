<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Faculty;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'faculty_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'email',
        'address',
        'contact_number',
        'password',
        'authorize',
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
    ];


    public function posts(){

        return  $this->hasMany(Post::class);
     }

     public function getIsAdminAttribute()
     {
         return $this->roles()->where('id', 1)->exists();
     }


     public function faculty(){

        return $this->belongsTo(Faculty::class, 'faculty_id');

    }

    public function scopeSearch($query, $search)
    {
            $search = "%$search%";
    return  $query->where(function($query) use ($search){

            $query->where('first_name', 'like',   $search)
                ->orWhere('middle_name', 'like',   $search)
                ->orWhere('last_name', 'like',   $search)
                ->orWhere('gender', 'like',    $search)
                ->orWhere('email', 'like',   $search)
                ->orWhere('address', 'like',    $search)
                ->orWhere('authorize', 'like',     $search)
                ->orWhere('contact_number', 'like',   $search);
        })

        ->orWhereHas('faculty', function($query) use ($search){
            $query->where('name', 'like',   $search);


       });

    //    $query->orWhereHas('faculty'($search) == 'Beneficiary/Partners', function($query) {
    //             $query->whereNull('faculty_id');
    //    });

    }





}
