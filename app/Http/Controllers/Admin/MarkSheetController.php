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
class MarkSheetController extends Controller
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
        return view('admin.marksheet.index',compact('classes','years','exams'));
    }


    public function searchMarkSheet(Request $request){
        $marks=Mark::where(['id_card'=>$request->student_id,'year_id'=>$request->year,'class_id'=>$request->class,'exam_id'=>$request->exam])->get();
        $totalMark=Mark::where(['id_card'=>$request->student_id,'year_id'=>$request->year,'class_id'=>$request->class,'exam_id'=>$request->exam])->sum('mark');


        $grades=GradPoint::all();
        $student=Student::where('student_id',$request->student_id)->first();

        $faild=0;
        $gpa=0.0;
        foreach($marks as $mark){
            if($mark->mark <33 ) $faild=1;
            foreach($grades as $grade){
                if($mark->mark >= $grade->start_mark && $mark->mark <= $grade->end_mark){
                    $gpa += $grade->start_point;
                }
            }
        }
       $gpa= $gpa / count($marks);
        return view('admin.marksheet.show',compact('marks','grades','student','totalMark','faild','gpa'));
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
