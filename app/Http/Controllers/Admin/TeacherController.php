<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use App\Designation;
use Image;
use Hash;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::with('designation')->get();
        return view('admin.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations=Designation::all();
        return view('admin.teacher.create',compact('designations'));
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
            'address'=>'required',
            'nid'=>'required',
            'date_of_birth'=>'required',
            'join_date'=>'required',
            'gender'=>'required',
            'designation_id'=>'required',
            'salary'=>'required',
            'educations'=>'required',
            'password'=>'required',
            'photo'=>'required',

        ]);

        $photo=$request->file('photo');
        $ext=$photo->getClientOriginalExtension();
        $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
        $path='public/uploads/teachers/';
        $upload_path=$path.$name;
        Image::make($photo)
                ->resize(150,180)
                ->save($upload_path);


        $year=date('Ym');
        $findTeacher=Teacher::orderBy('id','DESC')->first();
        if($findTeacher==null){
            $teacherId='0001';
        }else{
            $id=$findTeacher->id+1;
            if($id<10){
                $teacherId="000".$id;
            }else if($id<100){
                $teacherId="00".$id;
            }else if($id<1000){
                $teacherId="0".$id;
            }
        }

        $teacher=Teacher::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'teacher_id'=>$year.$teacherId,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'nid'=>$request->nid,
                    'designation_id'=>$request->designation_id,
                    'salary'=>$request->salary,
                    'educations'=>$request->educations,
                    'date_of_birth'=>$request->date_of_birth,
                    'join_date'=>$request->join_date,
                    'password'=>Hash::make($request->password),
                    'image'=>$upload_path,
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
