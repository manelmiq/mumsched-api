<?php

namespace App\Http\Controllers;

use App\Faculties;
use App\Services\FacultyService as FacultyService;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    protected $facultyService;

    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    public function index()
    {
        return $this->facultyService->index();
    }

    public function show($id)
    {
        return $this->facultyService->show($id);
    }

    public function store(Request $request)
    {
        return $this->facultyService->store($request);
    }

    public function update(Request $request, Faculties $faculty)
    {
        return $this->facultyService->update($request, $faculty);
    }

    public function delete(Faculties $faculty)
    {
        return $this->facultyService->delete($faculty);
    }

    public function login(Request $request){
        $faculty = Faculties::select('id', 'firstName','lastName', 'email')
            ->where([
                ['email', '=', $request->input('email')],
                ['password', '=', $request->input('password')],
            ])->first();
        $response['response'] = $faculty;
        if($faculty == null){
            $response['response'] = false;
        }
        return response()->json($response);
    }

    public function getCoursePreferences($facultyId) {
        return $this->facultyService->getCoursePreferences($facultyId);
    }

    public function storeCoursePreferences(Request $request, Faculties $faculty) {
        return $this->facultyService->storeCoursePreferences($request, $faculty);
    }

    public function updateCoursePreferences(Request $request, Faculties $faculty) {
        return $this->facultyService->updateCoursePreferences($request, $faculty);
    }

    public function getBlockPreferences($facultyId) {
        return $this->facultyService->getBlockPreferences($facultyId);
    }

    public function storeBlockPreferences(Request $request, Faculties $faculty) {
        return $this->facultyService->storeBlockPreferences($request, $faculty);
    }

    public function updateBlockPreferences(Request $request, Faculties $faculty) {
        return $this->facultyService->updateBlockPreferences($request, $faculty);
    }

}
