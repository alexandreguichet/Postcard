<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Ta;
use App\Models\Teacher;

class UserController extends Controller
{
    public function login(Request $request) {
        if($request->userType == 'student') {
            $data = ['password' => $request->password, 'email' => $request->email];
            $user = Student::getFirst($data);
        } elseif($request->userType == 'teacher') {
            $data = ['password' => $request->password, 'email' => $request->email];
            $user = Teacher::getFirst($data);
        } else {
            $data = ['password' => $request->password, 'email' => $request->email];
            $user = Ta::getFirst($data);
        }

        return response()->json(['user' => $user, 'userType' => $request->userType]);
    }
}
