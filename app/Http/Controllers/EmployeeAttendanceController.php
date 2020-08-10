<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeAttendance;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employee = $users = DB::table('employees')->get();
        //  dd($employee);
        return view('HR.mark_attendance' ,compact('employee'));
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
        $hr_id = Auth::user()->id;
        $data = $request->all();
        // dd($data["employee_id"]);
        //  dd($data["status"]);
        $count = count($data["employee_id"]);
        $now = Carbon::now();
        $date =$now->format('Y-m-d');
        // dd($date);
        $att = DB::table('employee_attendances')
        ->where('date',  $date)
        ->get();
      
        
        if($att->isEmpty()){
            // dd('asdsad');
            for($i = 1 ; $i <= $count ; $i++){
                $date = $now->toDateString();
                
                $done =EmployeeAttendance::create(['employee_id' => $data["employee_id"][$i], 'status' =>$data["status"][$i],'date' => $date ]);
            
                // dd($done);
        //   
          
            }
            toastr()->success('Attendance marked succesfully');
            return redirect('/save_attendance');
        }
        else{
            // dd('asd');
            toastr()->warning('Attendance already taken');
            // return redirect()->back();
            return redirect()->back();
        }
    }
        
        // return view('Teachers.mark_attendance');
    
        public function showemployeeAttendence(Request $request)
        {
            // dd($request->all());
            $empattendence= DB::table('employee_attendances')->distinct()->get(['date']);
            // dd($empattendence);
            return view('HR.show_attendance', compact('empattendence'));
        }

        public function showattendance(Request $request)
        {
            
            // $teacher_id = Auth::user()->id;
            // dd($request->all());
            
            // $data = DB::table('student_attendances')
            $data = DB::table('employee_attendances')
            
            ->select('employee_id','status','date')
            ->where('date' , $request->date)
           ->get();
        //    dd($data);
            //  $student_name=DB::table('students')
            //  ->select('student_name')
            //  ->where('student_id',$data["student_id"])
            //  ->get();
            // dd($student_name);
            return view('HR.viewEmployeeAttendance', compact('data'));
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

        $date=$id;
        $data=DB::table('employee_attendances')
      ->where('date',$id)->get();
      return view('HR.editAttendence',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function updateAttendence(Request $request){

    //   dd($request->all());
    // $count = count($req);

    $count=count(($request->employee_id));
    
    // dd($count);
   
    for($i=0 ; $i <$count ; $i++){
       
        $data =DB::table('employee_attendances')
        ->where('employee_id' ,$request->employee_id[$i])
        ->get();
        // dd($attendee);
        $d=DB::table('employee_attendances')
        ->where('employee_id',$request->employee_id[$i])
        ->update([
            'status'=>$request->status[$i]
        ]);

     
    }
    // dd($data);
    return view('HR.viewEmployeeAttendance',compact('data'));
}
public function search(Request $request){
        //   dd($request->all());
        $data=DB::table('employee_attendances')
        ->where(DB::raw("DATE_FORMAT(date, '%Y-%m')"),$request->month)
        ->where('employee_id',$request->employee_id)
        ->get();
        // dd( $clicks2);

        return view('HR.viewEmployeeAttendance',compact('data'));
}
public function searchbydate(Request $request){
    //   dd($request->all());
    $data=DB::table('employee_attendances')
    ->where('date',$request->date)
   
    ->get();
    // dd( $clicks2);

    return view('HR.viewEmployeeAttendance',compact('data'));
}


    public function update(Request $request)
    {
        // $data = $request->all();
        // dd($request->all());
        //  dd($data['student_id']);
      

    //   dd($emp);
        $count = count($emp);
        // dd($count);
       
        for($i=0 ; $i <$count ; $i++){
           
            // $attendee =EmployeeAttendance::all()
            // ->where('employee_id' , $emp['employee_id'][$i])
            // ->where('date',$request->date)
            // ->first();
            // dd($attendee);
            $attendee=DB::table('employee_attendances')
            ->where('employee_id',$emp[$i]->employee_id)
            ->where('date',$request->date)
            ->update([
                'status'=>$emp[$i]->status
            ]);

            // dd($attendee);
        }
        return view('HR.viewEmployeeAttendance',compact('attendee'));

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
