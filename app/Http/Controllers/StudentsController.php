<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Students;
use DB;

class StudentsController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Students::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = Students::create($request->all());
        return response()->json($students);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
        $students->update($request->all());
        return response()->json($students);
    }

    public function delete(Students $students)
    {
        $students->delete();
        return response()->json(null, 204);
    }
}
