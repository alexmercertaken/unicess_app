<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;


    protected $fillable = ['program'];

    public function projectproposal(){

        return $this->belongsTo(ProjectProposal::class);
    }
}
