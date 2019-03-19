<?php

namespace App\Http\Controllers;


use App\Services\StudentCourseRegistrationService;
use App\StudentsCoursesRegistration;
use Illuminate\Http\Request;
use App\Students;


class StudentCourseRegistrationController extends Controller
{
    protected $studentsCourseService;

    public function __construct(StudentCourseRegistrationService $studentsCourseService)
    {
        $this->studentsCourseService = $studentsCourseService;
    }


    public function index()
    {
        return $this->studentsCourseService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->studentsCourseService->store($request);
    }


    public function show($id)
    {
        return $this->studentsCourseService->show($id);
    }


    public function update(Request $request, StudentsCoursesRegistration $registrations)
    {
        return $this->studentsCourseService->update($request, $registrations);
    }

    public function delete(StudentsCoursesRegistration $registration)
    {
        return $this->studentsCourseService->delete($registration);
    }
}
