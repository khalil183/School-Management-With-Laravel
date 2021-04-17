<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FeeAmount;
use App\FeeCategory;
use App\Year;
use App\StudentClass;
class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeAmounts=FeeAmount::all();
        return view('admin.feeAmount.index',compact('feeAmounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feeCategories=FeeCategory::all();
        $years=Year::all();
        $classes=StudentClass::all();
        return view('admin.feeAmount.create',compact('feeCategories','years','classes'));
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
            'year'=>'required',
            'class'=>'required',
            'amount'=>'required',
        ]);

        FeeAmount::create([
            'fee_category_id'=>$request->fee_category,
            'year_id'=>$request->year,
            'class_id'=>$request->class,
            'amount'=>$request->amount,
        ]);

        $notification=array(
            'messege'=>'Created SuccessfullY',
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
