<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Year;
use App\StudentClass;
use App\FeeCategory;
use App\FeeHistory;
use App\FeeAmount;
use App\Student;
use App\AssignStudent;
use App\Month;
class FeeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years=Year::all();
        $classes=StudentClass::all();
        $months=Month::all();
        $feeCategories=FeeCategory::all();
        return view('admin.accounts.studentFee.index',compact('years','classes','feeCategories','months'));
    }


    public function searchAmount(Request $request){
        $amount=FeeAmount::where(['fee_category_id'=>$request->feeCategoryId,'year_id'=>$request->yearId,'class_id'=>$request->classId])->first();


        $students=AssignStudent::with('student')->where(['year_id'=>$request->yearId,'class_id'=>$request->classId])->get();

        $studenResponse="<option value=''>Select Student</option>";
        foreach($students as $row){
            $studenResponse .= "<option value=".$row->student->student_id.">".$row->student->name."-(".$row->student->student_id.")"."</option>";
        }
        return response()->json(['student'=>$studenResponse,'amount'=>$amount]);
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
            'fee_category'=>'required',
            'class'=>'required',
            'year'=>'required',
            'student'=>'required',
            'month'=>'required',
        ]);

        $available=FeeHistory::where(['fee_category_id'=>$request->fee_category,'year_id'=>$request->year,'class_id'=>$request->class,'student_id_card'=>$request->student])->first();
        if(!$available){
            $fee=FeeHistory::create([
                'fee_category_id'=>$request->fee_category,
                'class_id'=>$request->class,
                'year_id'=>$request->year,
                'student_id_card'=>$request->student,
                'month_id'=>$request->month,
                'amount'=>$request->amount,
            ]);

            $notification=array(
                'messege'=>'Payment SuccessfullY',
                'alert-type'=>'success'
                 );

            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Allready Payment',
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
