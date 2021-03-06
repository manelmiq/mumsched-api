<?php

namespace App\Http\Controllers;

use App\Services\StudentsService;
use App\StudentBlocks;
use Illuminate\Http\Request;
use App\Students;

class StudentsController extends Controller
{

    protected $studentsService;

    public function __construct(StudentsService $studentsService)
    {
        $this->studentsService = $studentsService;
    }

    public function login(Request $request){

        $students = Students::select('id', 'firstName', 'lastName', 'email')
            ->where([
                ['email', '=', $request->input('email')],
                ['password', '=', $request->input('password')],
                    ])->first();
        $response['response'] = $students;
        if($students == null){
            $response['response'] = false;
        }
        return response()->json($response);
    }


    public function index()
    {
        return $this->studentsService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->studentsService->store($request);
    }

    public function show($id)
    {
        return $this->studentsService->show($id);
    }

    public function update(Request $request, Students $students)
    {
        return $this->studentsService->update($request, $students);
    }

    public function delete(Students $students)
    {
        return $this->studentsService->delete($students);
    }

    public function getBlocks($blocks)
    {
        return $this->studentsService->getBlocks($blocks);
    }

    public function getAllBlocks($student)
    {
        return $this->studentsService->getAllBlocks($student);
    }

    public function updateAllBlocks($student, Request $blocks)
    {
        return $this->studentsService->updateAllBlocks($student, $blocks);
    }

    public function getCoursesAvailable($students){
        return $this->studentsService->getBlocksinSection($students);
    }


    public function registration($students)
    {
        return $this->studentsService->registration($students);
    }

    public function getSchedule(Students $student){
        return $this->studentsService->getSchedule($student);

    }


}
