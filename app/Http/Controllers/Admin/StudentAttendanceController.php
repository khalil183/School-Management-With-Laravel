<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mark;
use App\Year;
use App\StudentClass;
use App\Book;
use App\Exam;
use App\AssignSubject;
use App\AssignStudent;
use App\StudentAttendance;
class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $years=Year::orderBy('year','DESC')->get();
        $classes=StudentClass::all();
        return view('admin.attendance.student.index',compact('years','classes'));
    }

    public function searchAttendance(Request $request){
        $yearId=$request->yearId;
        $classId=$request->classId;
        $attendances=StudentAttendance::where(['year_id'=>$yearId,'class_id'=>$classId])->groupBy('date')->select('date')->get();

        return view('admin.attendance.student.loadAttendance',compact('attendances','yearId','classId'));
    }


    public function studentAttendanceHistory(){
        $years=Year::orderBy('year','DESC')->get();
        $classes=StudentClass::all();
        return view('admin.attendance.student.studentHistory',compact('years','classes'));
    }

    public function searchStudentAttendanceHistory(Request $request){
        $yearId=$request->yearId;
        $classId=$request->classId;
        $students=AssignStudent::with('student','attendances')
                    ->where(['year_id'=>$yearId,'class_id'=>$classId])->get();

        return view('admin.attendance.student.loadStudentAttendance',compact('students','yearId','classId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years=Year::orderBy('year','DESC')->get();
        $classes=StudentClass::all();
        $exams=Exam::all();
        return view('admin.attendance.student.create',compact('years','classes','exams'));
    }

    public function searchStudent(Request $request){
        $yearId=$request->yearId;
        $classId=$request->classId;
        $date=$request->date;
        $students=AssignStudent::with('student')
                    ->where(['year_id'=>$yearId,'class_id'=>$classId])->get();

        return view('admin.attendance.student.loadStudent',compact('students','yearId','classId','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $available=StudentAttendance::where(['year_id'=>$request->yearId,'class_id'=>$request->classId,
        'date'=>$request->date])->first();
        if(!$available){
            foreach($request->student_id as $row){
                StudentAttendance::create([
                    'student_id'=>$row,
                    'id_card'=>$request->id_card[$row],
                    'year_id'=>$request->yearId,
                    'class_id'=>$request->classId,
                    'date'=>$request->date,
                    'attendance'=>$request->attendance[$row],
                ]);
            }

            $notification=array(
                'messege'=>'Attendance Take SuccessfullY',
                'alert-type'=>'success'
                 );

            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Attendance Allready Taken',
                'alert-type'=>'error'
                 );

            return Redirect()->back()->with($notification);
        }

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
        $data=explode('&',$id);
        $date= $data[0];
        $classId= $data[1];
        $yearId= $data[2];

        $attendances=StudentAttendance::with('student','studentClass','year')->where(['year_id'=>$yearId,'class_id'=>$classId,
        'date'=>$date])->get();

        return view('admin.attendance.student.edit',compact('attendances','date'));


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
        foreach($request->id as $row){
            StudentAttendance::where('id',$row)->update([
                'attendance'=>$request->attendance[$row],
            ]);
        }

        $notification=array(
            'messege'=>'Attendance Update SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('admin.student-attendance.index')->with($notification);

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
