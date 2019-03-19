<?php
/**
 * Created by PhpStorm.
 * User: emmanuell
 * Date: 3/18/19
 * Time: 5:16 PM
 */


namespace App\Services;
use Illuminate\Http\Request;
use App\StudentsCoursesRegistration;



class StudentCourseRegistrationService
{



    public function index()
    {
        return StudentsCoursesRegistration::all();
    }

    public function show($id)
    {
        return StudentsCoursesRegistration::find($id);
    }

    public function store(Request $request)
    {
        $student = StudentsCoursesRegistration::create($request->all());
        return response()->json($student);
    }

    public function update(Request $request, StudentsCoursesRegistration $registrations)
    {
//        dd($request);
        $registrations->update($request->all());
        return response()->json($registrations);
    }

    public function delete(StudentsCoursesRegistration $registration)
    {
        $registration->delete();
        return response()->json(null, 204);
    }

}