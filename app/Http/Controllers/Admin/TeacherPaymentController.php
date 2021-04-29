<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Year;
use App\Month;
use App\Teacher;
use App\TeacherPayment;
class TeacherPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years=Year::all();
        $months=Month::all();
        $teachers=Teacher::all();
        return view('admin.accounts.Teacher.index',compact('years','months','teachers'));
    }

    public function searchTeacherSalary(Request $request){
        $teacher=Teacher::find($request->teacherId);

        return response()->json($teacher->salary);
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
        $this->validate($request,[
            'teacher'=>'required',
            'year'=>'required',
            'month'=>'required',
            'salary'=>'required',
        ]);

        $available=TeacherPayment::where(['teacher_id'=>$request->teacher,
        'year_id'=>$request->year,
        'month_id'=>$request->month])->first();
        if(!$available){
            TeacherPayment::create([
                'teacher_id'=>$request->teacher,
                'year_id'=>$request->year,
                'month_id'=>$request->month,
                'amount'=>$request->salary,
            ]);

            $notification=array(
                'messege'=>'Created SuccessfullY',
                'alert-type'=>'success'
                 );

            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Allready Payment This Month',
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
