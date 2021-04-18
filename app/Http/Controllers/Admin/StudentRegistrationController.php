<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Year;
use App\StudentClass;
use App\AssignStudent;
use Image;
use Hash;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('admin.student.registration.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years=Year::all();
        $classes=StudentClass::all();
        return view('admin.student.registration.create',compact('years','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'address'=>'required',
            'date_of_birth'=>'required',
            'birth_reg_code'=>'required',
            'gender'=>'required',
            'class'=>'required',
            'year'=>'required',
            'roll'=>'required',
            'password'=>'required',
            'photo'=>'required',

        ]);

        $photo=$request->file('photo');
        $ext=$photo->getClientOriginalExtension();
        $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
        $path='public/uploads/students/';
        $upload_path=$path.$name;
        Image::make($photo)
                ->resize(150,180)
                ->save($upload_path);

        $year=Year::find($request->year)->year;
        $findStudent=Student::orderBy('id','DESC')->first();
        if($findStudent==null){
            $studentId='0001';
        }else{
            $id=$findStudent->id+1;
            if($id<10){
                $studentId="000".$id;
            }else if($id<100){
                $studentId="00".$id;
            }else if($id<1000){
                $studentId="0".$id;
            }
        }

        $student=Student::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'student_id'=>$year.$studentId,
                    'father_name'=>$request->father_name,
                    'mother_name'=>$request->mother_name,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'date_of_birth'=>$request->date_of_birth,
                    'birth_reg_code'=>$request->birth_reg_code,
                    'password'=>Hash::make($request->password),
                    'photo'=>$upload_path,
                ]);
        $assignStudent=AssignStudent::create([
            'student_id'=>$student->id,
            'class_id'=>$request->class,
            'year_id'=>$request->year,
            'roll'=>$request->roll,
        ]);

        $notification=array(
            'messege'=>'Registration SuccessfullY',
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
