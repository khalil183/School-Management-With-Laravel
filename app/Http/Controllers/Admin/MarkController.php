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
class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks=Mark::all();
        return view('admin.mark.index',compact('marks'));
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
        return view('admin.mark.create',compact('years','classes','exams'));
    }

    public function classBySubject($id){
       $subjects=AssignSubject::with('book')->where('class_id',$id)->get();

       $response="";

       if(count($subjects)==0){
            $response .= '<option value="">Select Subject</option>';
       }else{
            foreach($subjects as $row){
                $response .= '<option value='.$row->book->id.'>'.$row->book->name.'</option>';
            }

       }

       return response()->json($response);

    }

    public function searchStudent(Request $request){
        $subjectId=$request->subjectId;
        $examId=$request->examId;
        $yearId=$request->yearId;
        $classId=$request->classId;

        $students=AssignStudent::with('student')
                    ->where(['year_id'=>$yearId,'class_id'=>$classId])->get();

        return view('admin.mark.loadStudent',compact('students','subjectId','examId','yearId','classId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->student_id as $key => $row){
            Mark::create([
                'student_id'=>$row,
                'id_card'=>$request->id_card[$key],
                'mark'=>$request->marks[$key],
                'year_id'=>$request->yearId,
                'class_id'=>$request->classId,
                'subject_id'=>$request->subjectId,
                'exam_id'=>$request->examId,
            ]);
        }

        $notification=array(
            'messege'=>'Marks Entry SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->back()->with($notification);
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
