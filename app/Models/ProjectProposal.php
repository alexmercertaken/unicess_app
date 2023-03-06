<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProposal extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'program_id', 'projact_title', 'started_date',
        'finished_date', 'budget_proposed', 'description', 'moa_file', 'authorize'];


    public function programs(){

        return  $this->hasMany(Program::class);
     }
}
