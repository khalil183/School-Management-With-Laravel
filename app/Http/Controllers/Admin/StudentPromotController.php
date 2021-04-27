<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Year;
use App\StudentClass;
use App\Exam;
use App\Mark;
use App\GradPoint;
use App\Student;
use App\AssignStudent;

class StudentPromotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=StudentClass::all();
        $years=Year::all();
        $exams=Exam::all();
        return view('admin.studentPromotion.index',compact('classes','years','exams'));
    }


    public function searchStudent(Request $request){
        $students=AssignStudent::with('marks','totalMark')->where(['year_id'=>$request->prev_year,'class_id'=>$request->prev_class])->get();
        $grades=GradPoint::all();

        return $students;

        return view('admin.studentPromotion.show',compact('students','grades'));
    }

    public function promote(Request $request){
        return $request;

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
