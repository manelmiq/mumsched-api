<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 18/03/2019
 * Time: 1:09 PM
 */

namespace App\Services;

use App\Sections;
use App\StudentBlocks;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Blocks;
use App\Services\StudentCourseRegistrationService;
use phpDocumentor\Reflection\Types\Array_;

class StudentsService
{
    public function index()
    {
        return Students::all();
    }

    public function show($id)
    {
        return Students::find($id);
    }

    public function store(Request $request)
    {
        $student = Students::create($request->all());
        return response()->json($student);
    }

    public function update(Request $request, Students $student)
    {
        $student->update($request->all());
        return response()->json($student);
    }

    public function delete(Students $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }

    public function getBlocks($student)
    {
        return StudentBlocks::where('id_student', '=', $student)->get();
    }


    public function getAllBlocks($student)
    {
        $allBLocks = Blocks::all()->toArray();
        $studentBlocks = StudentBlocks::where('id_student', '=', $student)->get()->toArray();

        $response = [];
        foreach ($allBLocks as $block) {
            foreach ($studentBlocks as $studentBlock) {
                if ($block['id'] == $studentBlock['id_block']) {
                        $block['isAssigned'] = true;
                        break;
                    } else {
                        $block['isAssigned'] = false;
                    }
            }

            if (!count($studentBlocks)) {
                $block['isAssigned'] = false;
            }

            array_push($response, $block);
        }

        return $response;
    }

    public function updateAllBlocks($student, $blocks)
    {
        StudentBlocks::where('id_student', '=', $student)->delete();
        foreach ($blocks->id_blocks as $block) {
            StudentBlocks::create(['id_student' => $student, 'id_block' => $block]);
        }

        return StudentBlocks::where('id_student', '=', $student)->get()->toArray();
    }

    public function getBlocksinSection($students)
    {
        $courses =
            DB::select(
                DB::raw(
                    "select sections.id as id_section, block.id as block_id, course.*, 
                          sections.capacity, 
                          concat(faculty.firstName , ' ',  faculty.lastName) as facultyName 
                        from student_blocks student_block
                               inner join sections sections on sections.id_block=student_block.id_block                     
                               inner join students student on student_block.id_student=student.id
                               inner join faculties faculty on sections.id_faculty=faculty.id
                               inner join courses course on sections.id_course=course.id
                               inner join blocks block on student_block.id_block=block.id
                        where student_block.id_student='"
                    . $students . "'"
                ));
        $array = response()->json($courses)->getData();
        $collection = collect($array);
        $grouped = $collection->groupBy('block_id');
        $arrayJson = array();
        foreach ($grouped as $key => $value) {
            $arr = array();
            $blocks = Blocks::find($key);
            $arr['block_id'] = $blocks->id;
            foreach ($value as $alphabet => $collection) {
                $enrolls =
                    DB::select(
                        DB::raw(
                            "select (count(id_student) ) as enrolleds
                                     from students_courses_registrations
                                    where id_section='" . $collection->id_section . "'
                                   group by id_section"
                        ));

                $enrollsJson = response()->json($enrolls)->getData();
                $enrollsJson = collect($enrollsJson)->first();
                $array = json_decode(json_encode($enrollsJson), true);
                $collection->enrolled = ($array['enrolleds'] == null) ? 0 : $array['enrolleds'];
                $collection->seats_available = $collection->capacity - $array['enrolleds'];
//                var_dump($collection);
            }
            $arr['description'] = $blocks->description;
            $arr['courses'] = $value;
            $arrayJson[] = $arr;
        }
        return response()->json($arrayJson, 200);
    }

    public function registration($students)
    {
        $courses =
            DB::select(
                DB::raw(
                    "select sections.id as id_section, block.id as block_id, course.*, 
                          sections.capacity, 
                          concat(faculty.firstName , ' ',  faculty.lastName) as facultyName 
                        from student_blocks student_block
                               inner join sections sections on sections.id_block=student_block.id_block                     
                               inner join students student on student_block.id_student=student.id
                               inner join faculties faculty on sections.id_faculty=faculty.id
                               inner join courses course on sections.id_course=course.id
                               inner join blocks block on student_block.id_block=block.id
                        where student_block.id_student='"
                    . $students . "'"
                ));
        $array = response()->json($courses)->getData();
        $collection = collect($array);
        $grouped = $collection->groupBy('block_id');
        $arrayJson = array();
        foreach ($grouped as $key => $value) {
            $arr = array();
            $blocks = Blocks::find($key);
            $arr['block_id'] = $blocks->id;
            foreach ($value as $alphabet => $collection) {
                $enrolls =
                    DB::select(
                        DB::raw(
                            "select (count(id_student) ) as enrolleds
                                     from students_courses_registrations
                                    where id_section='" . $collection->id_section . "'
                                   group by id_section"
                        ));
                $enrollsJson = response()->json($enrolls)->getData();
                $enrollsJson = collect($enrollsJson)->first();
                $array = json_decode(json_encode($enrollsJson), true);

                $collection->enrolled = ($array['enrolleds'] == null) ? 0 : $array['enrolleds'];
                $collection->seats_available = $collection->capacity - $array['enrolleds'];
            }
            $arr['description'] = $blocks->description;
            $arr['courses'] = $value;
            $arrayJson[] = $arr;
        }

        $arrayJson = json_decode(json_encode($arrayJson), true);
        $coursesAvailables = $arrayJson;
        $coursesAvailablesFilter = $arrayJson;

        $sectionsRegistrations = Students::find($students)->sectionsRegistrations()->get();
        $sectionsRegistrations = json_decode(json_encode($sectionsRegistrations), true);
        $blocksRegister = array();
        foreach ($sectionsRegistrations as $registration) {
            $registration = json_decode(json_encode($registration), true);
            array_push($blocksRegister, $registration['id_block']);
        }
//        var_dump($coursesAvailables);
        $index = 0;
        foreach ($coursesAvailables as $coursesAvailableList) {
            $coursesAvailableList = json_decode(json_encode($coursesAvailableList), true);
//            var_dump($coursesAvailableList);
//            continue;
//            var_dump($blocksArray);
            $coursesAvailablesFilter[$index]['courses'] = [];
            foreach ($coursesAvailableList['courses'] as $courses) {
                $coursesArrayFormat = json_decode(json_encode($courses), true);
//                var_dump($coursesArrayFormat['block_id']);
//                continue;
//                var_dump($courses['block_id']);
                $tobeAdd = true;
                if (in_array($coursesArrayFormat['block_id'], $blocksRegister)) {
//                    echo "need to be deleted";
//                    $coursesArrayFormat['toBeDeleted'] = true;
                    $tobeAdd = false;
                }
                if ($tobeAdd) {
                    array_push($coursesAvailablesFilter[$index]['courses'], $coursesArrayFormat);
                }
            }
            $index++;
        }
        return response()->json($coursesAvailablesFilter, 200);
    }


    public function getSchedule(Students $student){
         $sections = $student->sectionsScheduled()->get();

         $response = array();
         for ($i = 0; $i < count($sections); $i++) {
             $block = $sections[$i]->block()->get();
             $faculty = $sections[$i]->faculty()->get();
             $course = $sections[$i]->course()->get();

             $response[$i]['block_id'] = $block[0]->id;
             $response[$i]['start_date'] = $block[0]->start_date;
             $response[$i]['end_date'] = $block[0]->end_date;
             $response[$i]['block_description'] = $block[0]->description;
             $response[$i]['on_campus'] = $block[0]->on_campus;
             $response[$i]['faculty_id'] = $faculty[0]->id;
             $response[$i]['faculty_name'] = $faculty[0]->firstName.' '.$faculty[0]->lastName;
             $response[$i]['faculty_email'] = $faculty[0]->email;
             $response[$i]['course_id'] = $course[0]->id;
             $response[$i]['course_code'] = $course[0]->code;
             $response[$i]['course_name'] = $course[0]->name;
             $response[$i]['course_description'] = $course[0]->description;
             $response[$i]['course_level'] = $course[0]->course_level;
         }

         return $response;

    }


}