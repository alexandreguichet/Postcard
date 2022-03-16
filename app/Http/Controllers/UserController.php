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
            $user = Student::first($data);
        } elseif($request->userType == 'teacher') {
            $data = ['password' => $request->password, 'email' => $request->email];
            $user = Teacher::first($data);
        } else {
            $data = ['password' => $request->password, 'email' => $request->email];
            $user = Ta::first($data);
        }

        return response()->json(['user' => $user, 'userType' => $request->userType]);
    }

    public function signup(Request $request) {
        if($request->userType == 'student') {
            $data = ['password' => $request->password, 'email' => $request->email, 'student_number' => $request->student_number, 'name' => $request->name];
            $user = Student::create($data);
        } elseif($request->userType == 'teacher') {
            $data = ['password' => $request->password, 'email' => $request->email, 'name' => $request->name, 'title' => $request->title];
            $user = Teacher::create($data);
        } else {
            $data = ['password' => $request->password, 'email' => $request->email, 'name' => $request->name];
            $user = Ta::create($data);
        }

        return response()->json(['user' => $user, 'userType' => $request->userType]);
    }
}
