<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profileRender(string $id) {
        $findStudent = Student::findOrFail($id);

        return view('profile', ['user' => $findStudent]);
    }
}
