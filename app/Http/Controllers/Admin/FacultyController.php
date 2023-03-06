<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Faculty::all();
        $users = User::whereNotNull('faculty_id')->orderBy('first_name', 'asc' )->where(function($query){
           if($facultyId = request('faculty_id')) {
                $query->where('faculty_id', $facultyId);
            }

           if($search = request('search')){

                $query-> where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('middle_name', 'LIKE', "%{$search}%")
                ->orWhere('middle_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
                // ->orWhere('faculty_id', 'LIKE', "%{$search}%");



           }


        })->get();

        $faculties = Faculty::orderBy('name')->pluck('name', 'id')->prepend('All Faculties', '');

        return view('admin.faculty.index', compact('faculty', 'users', 'faculties'));
    }
}
