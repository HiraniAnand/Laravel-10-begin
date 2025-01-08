<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function makereg(Request $request){
        // dd($request->all());
        /* $student = Student::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'hobbies' => json_encode(@$request->hobbies),
        ]); */
        $hobbies = json_encode($request->hobbies);
        DB::statement('INSERT INTO students (name, dob, mobile, email, gender, address, city, state, country, hobbies, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->name,
            $request->dob,
            $request->mobile,
            $request->email.time(),
            $request->gender,
            $request->address,
            $request->city,
            $request->state,
            $request->country,
            $hobbies
        ]);
        dd($student);
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'dob' => 'required|date',
        //     'mobile' => 'required|string|regex:/^[0-9]{10}$/',
        //     'email' => 'required|string|email|max:255|unique:students',
        //     'gender' => 'required|string',
        //     'address' => 'required|string',
        //     'city' => 'required|string',
        //     'state' => 'required|string',
        //     'country' => 'required|string',
        //     'hobbies' => 'required|array',
        // ]);

        $student = Student::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'hobbies' => json($request->hobbies),
        ]);
        dd($student);

        // $hobbies = json_encode($request->hobbies);
        // DB::insert('INSERT INTO students (name, dob, mobile, email, gender, address, city, state, country, hobbies, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
        //     $request->name,
        //     $request->dob,
        //     $request->mobile,
        //     $request->email,
        //     $request->gender,
        //     $request->address,
        //     $request->city,
        //     $request->state,
        //     $request->country,
        //     $hobbies
        // ]);

        return redirect()->back()->with('success', 'Student registered successfully.');
    }
}