<?php

namespace App\Http\Controllers;

use App\ClassTimeTable;
use Illuminate\Http\Request;
use DB;

class ClassTimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('Examination.class_Timetable');
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
        // dd($request->all());
        $detail=DB::table('class_time_tables')
        ->where('class_id',$request->class_id)->where('year',$request->year)->get();
        // dd($detail);
    
        if($detail->isEmpty()){
          $data=$request->all([
            'class_id',
             'year',
             'subject_id',
             'period_no',
             'Room_no',
            
        ]);
        // dd( $data);
        ClassTimeTable::create($data);
        toastr()->success('Class Timetable Generated Succesfully');
            return View('Examination.class_Timetable');
          }
          else{
            toastr()->error('Already Generated');
            return redirect()->back();

          }


        // DB::table('')
    }
      public function showclassTimetable(){
          $data=DB::table('class_time_tables')
          ->join('classes','classes.class_id','class_time_tables.class_id')
          ->join('subjects','subjects.subject_id','class_time_tables.subject_id')
          ->select('classes.*','class_time_tables.*','subjects.*')
          ->get();
        //   dd($data);
          return View('Examination.viewClassTimetable',compact('data'));
      }


     
    /**
     * Display the specified resource.
     *
     * @param  \App\ClassTimeTable  $classTimeTable
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTimeTable $classTimeTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassTimeTable  $classTimeTable
     * @return \Illuminate\Http\Response
     */
 public function edit($id)
    {
        // dd($id);
        $data=DB::table('class_time_tables')
        ->where('class_id',$id)->get();
        return view('Examination.editTimeTable',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassTimeTable  $classTimeTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());



        $classtimetbale =ClassTimeTable::where('class_id', $id)->first();
        if($classtimetbale != null){
            // dd($request->all());
            $classtimetbale->class_id=$request->class_id;
            $classtimetbale->year=$request->year;
            $classtimetbale->subject_id = $request->subject_id;
            $classtimetbale->period_no = $request->period_no;
            $classtimetbale->Room_No=$request->Room_No;
         
            $classtimetbale->save();
            // dd($branch->address);
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassTimeTable  $classTimeTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassTimeTable $classTimeTable)
    {
        //
    }
}
