<?php

namespace App\Http\Controllers;

use App\Models\ProjectProposal;
use App\Models\Program;
use Illuminate\Http\Request;

class ProjectProposalController extends Controller
{
    public function index()
    {
        $program = Program::all();

        return view('admin.proposal.index', compact('program'));
    }


    public function show($id)
    {
       return view('admin.proposal.show');
    }
}
