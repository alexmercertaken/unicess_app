<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
class ProgramController extends Controller
{
    public function index(){

        $program = Program::all();

        return view('admin.program.index', compact('program'));
    }
}
