<?php

namespace App\Http\Controllers;
use DB;
use App\Fee;

use App\Students;
use App\FeeDetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = DB::table('fees')
        ->join('classes','classes.class_id','fees.class_id')
        ->select('classes.*','fees.*')
        ->get();
        return View('Accounts.view_fees',compact('fees'));
    }
public function fetchfees($id){
    if(request()->ajax())
    {
        $data = Fee::where('fee_id' , $id)
        ->get();
        // dd($data);
        return $data;
    } 
    
    return view('view_fees');

}
public function updatefees($id){
    $employee =Fee::where('fee_id', $id)->first();
    if($employee != null){
     //    dd($request);
         $employee->employee_name    = $request->employee_name;
         $employee->employee_designation = $request->employee_designation;
         $employee->employee_address     = $request->employee_address;
         $employee->employee_gender     = $request->employee_gender;
         $employee->employee_cnic   = $request->employee_cnic;
         $employee->employee_phone_number  = $request->employee_phone_number;
         $employee->employee_hireDate     = $request->employee_hireDate;
         $employee->employee_dob = $request->employee_dob;
         $employee->dept_id = $request->department;
         $employee->save();
     //    dd($id);
    }
    return redirect('/');

}
public function feechallan(){
    $class= Classes::all();
    $student=DB::table('students')
    ->join('classes','classes.class_id','students.student_class_of_admission')
    ->select('classes.*','students.*')
    ->get();
    return view('Accounts.feechallan',compact('class','student'));
}
public function bulk(Request $request){
    // dd($request->all());
    // dd($data['id']);
    
    $data=$request->all();
    $count= count($data['id']);
    // dd($count);
    for($i = 0 ; $i < $count ; $i++){

        FeeDetail::create(['student_id' => $data["id"][$i],'due_date' => $data["due_date"] , 'fee_month' => $data["fee_month"] , 'fees_id' => $data["fee_id"], 'current_ammount' => $data["current_ammount"],'arrears' => $data["current_ammount"], 'fee_status' => 0]);
         
     }


    $class= Classes::all();
    $student=DB::table('students')
    ->join('classes','classes.class_id','students.student_class_of_admission')
    ->select('classes.*','students.*')
    ->get();
    return view('Accounts.feechallan',compact('class','student'));
}

public function generatechallan(Request $request){
    $class= Classes::all();
    $student=DB::table('students')
    ->join('classes','classes.class_id','students.student_class_of_admission')
    ->select('classes.*','students.*')
    ->where('student_class_of_admission',$request->classes)
    ->get();
    // dd($student);
    $fees=DB::table('fees')
    ->where('class_id',$request->classes)
    ->get();
    // dd($fees,$student);
    return view('Accounts.generatechallan',compact('fees','student','class'));
}
// public function addfees($id){
//     $class= FeeDetail::all();
      
        
// }
public function paymenthistory(){
    $id = Auth::user()->id;
    $checkstatus = DB::table('fee_details')
    ->join('fees','fees.fee_id', '=' , 'fee_details.fees_id')
    ->join('students','students.student_id', '=' ,'fee_details.student_id')
    ->select('fee_details.*','fees.*','students.*')
    // ->where('students.user_id',$id)
    ->get();

    //  dd($checkstatus);
    return view('Accounts.paymenthistory',compact('checkstatus'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Accounts.setfees');


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
        if($request->fee_type=='Regular'){
            $detail=DB::table('fees')
            ->where('month',$request->month)->where('class_id', $request->class_id)->where('year',$request->year)->get();
           if($detail->isEmpty()){
            $data=$request->all([
                'class_id',
                'annual_charges',
                'lab',
                'tution_fee',
                'year',
                'branch_id',
                'late_charges',
                'fee_type',
                'month'
            ]);
            
    
            $amount=$request->annual_charges+$request->late_charges+$request->lab+$request->tution_fee;
        //    dd($amount);
            Fee::create($data+["amount"=>$amount]);
            // dd($data);
            toastr()->error('Created Succesfully');
    
            return View('Accounts.setfees');
    
            
            }
            else{
                toastr()->error('Already Exists');
                return redirect()->back();
            }


        }
         else if($request->fee_type=='Annual'){
            $detail=DB::table('fees')
            ->where('class_id', $request->class_id)->where('year',$request->year)->get();
           if($detail->isEmpty()){
            $data=$request->all([
                'class_id',
                'annual_charges',
                'lab',
                'tution_fee',
                'year',
                'branch_id',
                'late_charges',
                'fee_type',
                'month'
            ]);
            
    
            $amount=$request->annual_charges+$request->late_charges+$request->lab+$request->tution_fee;
        //    dd($amount);
            Fee::create($data+["amount"=>$amount]);
            // dd($data);
    
            return View('Accounts.setfees');
    
            
            }
            else{
                toastr()->error('Already Exists');
                return redirect()->back();
            }


        }
        else if($request->fee_type=='Late'){
            $detail=DB::table('fees')
            ->join('students','students.student_class_of_admission','fees.class_id')
            ->where('month',$request->month)->where('class_id', $request->class_id)->where('year',$request->year)->get();
            //   dd( $detail);

           if($detail->isEmpty()){
            $data=$request->all([
                'class_id',
                'annual_charges',
                'lab',
                'tution_fee',
                'year',
                'branch_id',
                'late_charges',
                'fee_type',
                'month'
            ]);
            
    
            $amount=$request->annual_charges+$request->late_charges+$request->lab+$request->tution_fee;
        //    dd($amount);
            Fee::create($data+["amount"=>$amount]);
            // dd($data);
    
            return View('Accounts.setfees');
    
            
            }
            else{
                toastr()->error('Already Exists');
                return redirect()->back();
            }


        }
        
        
        
       

      
    }
    public function EditFeeStructure(){
    // dd($id);

        return view('Accounts.edit_fees');
             

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
        // dd($id);
        $fees=DB::table('fees')        
        ->join('classes','classes.class_id','fees.class_id')
        ->select('classes.*','fees.*')
        ->where('fee_id',$id)
        ->first();
        
        return view('Accounts.edit_fees',compact('fees'));
    }
// public function search(Request $request){
//   dd($request);




// }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        // dd($id);

              DB::table('fees')->where('fee_id',$request->fee_id)->update([
            'class_id'=>$request->class_id,
            'annual_charges'=>$request->annual_charges,
            'lab'=>$request->lab,
            'tution_fee'=>$request->tution_fee,
            'year'=>$request->year,
            'amount'=>$request->amount,

        ]);
        // return View('Accounts.view_fees');
        return redirect()->action('AccountsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Fee::find($id)->delete();
        return redirect()->back();
        
    }
}
