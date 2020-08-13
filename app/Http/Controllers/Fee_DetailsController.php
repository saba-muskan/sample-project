<?php

namespace App\Http\Controllers;
use DB;
use App\FeeDetail;
use Illuminate\Http\Request;
use App\DateTime;
use Carbon\Carbon;
use PDF;
class Fee_DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Fee_Details.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return View('Fee_Details.setfee_details');

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    //    dd($request->all());
        $data=$request->all([
            'student_id',
            'due_date',
            'fee_month',
            'fees_id',
            'fee_status',
        ]);

    //    $current=DB::table('fees')
    //    ->select('amount') 
    //    ->where('fee_id',$request->fess_id)->first();
       $current=DB::table('fees')
       ->select('amount','due_date') 
       ->where('fee_id',$request->fees_id)->first();
        // dd($current);
        $start_time = \Carbon\Carbon::parse($request->input('due_date'));
        $finish_time = \Carbon\Carbon::parse($current->due_date);
        $diff =  $start_time->diffInDays($finish_time );
        if($diff<0){
            $current=DB::table('fees')
            ->select('amount') 
            ->where('fee_id',$request->fees_id)->first();
            
      if( $fees_id==''){
        $fees_id=DB::table('fee_details')
        ->select('fees_id')
        ->where('fees_id',$request->fees_id)->where('fee_month',$request->fee_month)->first();
        $arrears=0*100;
        $current=$arrears+$current->amount;
        FeeDetail::create($data+['current_ammount'=> $current,'arrears'=>$arrears]);

       
        return View('Fee_Details.setfee_details');

             }
    else{
        toastr()->error('Already Set');
        return redirect()->back();

        }
       
        }
        else{
            $fees_id=DB::table('fee_details')
            ->select('fees_id')
            ->where('fees_id',$request->fees_id)->where('fee_month',$request->fee_month)->first();
            $arrears=$diff*100;

            $current=$arrears+$current->amount;
            // dd($current);
            if( $fees_id==' '){
                FeeDetail::create($data+['current_ammount'=> $current,'arrears'=>$arrears]);
        
               
                return View('Fee_Details.setfee_details');
        
            }
            else{
                toastr()->error('Already Set');
                return redirect()->back();
        
            }
        }

            
     
       
        

    //    dd($current);
          
    // dd($fees_id);


     
       

    }
    public function search(Request $request){
        // dd($request->all());
        $class_id=$request->class_id;
        $student=DB::table('students')
        ->where('student_class_of_admission',$request->class_id)->get();
        //  dd($student);
           
        $class=DB::table('classes')
        ->select('classes.*')
        ->where('class_id',$request->class_id)->first();
        // dd($class);

      return view('Fee_Details.view_feeDetails',compact('student','class_id'));
    }

    public function GenerateFeeVocher(Request $request){
            //  dd($request->all());
            //  $ldate= new DateTime('now');
            //  $date=Carbon::now();
            $now = Carbon::now()->addDays(10)->format('Y-m-d');
                //  dd($now);
            //  dd($request->all());
             if($request->student_id==''){
                toastr()->error('No Student Are Registered In This Class');
                return redirect()->back();
             }else{
                $stu=count($request->student_id);
                //   dd($stu);
    
                 $current_amount=DB::table('fees')
                 ->select('amount')
                 ->where('fee_id',$request->fee_id)->where('class_id',$request->class_id)->first();
                //  dd($current_amount);
                
            
                 for($i=0; $i<$stu; $i++){
                   $fee_Vocher= FeeDetail::create(['student_id'=>$request->student_id[$i],'due_date'=>$now,'fee_month'=>$request->month,'fees_id'=>$request->fee_id,'current_ammount'=>$current_amount->amount,'arrears'=>0,'fee_status'=>0]);
                  
                 }
                 //    dd($stu_name);
                return redirect()->action('Fee_DetailsController@index');
             }
             

                 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


             public function searchClass(Request $request){
              

                 return view('Fee_Details.ClassFeeVoucher');
          
                }
            public function FeeVoucher(Request $request){
            //    dd('abc');
                // dd($request->all());
            
            $data=DB::table('fees')
            ->select('fee_id')
                ->where('class_id',$request->class_id)->first();
                // dd($data);
                $class=DB::table('classes')
                ->select('class_name')
                ->where('class_id',$request->class_id)->first();
                // dd( $class_name);
                // dd($data);

               if($data!=null)
               {
                $fee_detail=DB::table('fee_details')
                ->join('students','students.student_id','fee_details.student_id')
                ->where('fees_id',$data->fee_id)->get();
                // dd($fee_detail);

               }
               else{
                // $data->fee_id='';
                toastr()->error('Please Generate Fee Chalan First');
                return redirect()->back();

               }
               

            
                return view('Fee_Details.view_FeeVocher',compact('fee_detail','class'));
 
            }

            public function editfee($id,$date){
                // dd($id);
                $fee_detail=DB::table('fee_details')
                // ->join('students','students.student_id',$id)
                ->where('student_id',$id)->where('due_date',$date)
                ->update(['fee_status'=>1]);
                
                // dd($fee_detail);

                // $stu=DB::table('students')
                // ->where('student_id',$id)->get();
                // // dd( $stu_name);
                // // ->join('students','students.student_id','fee_details.student_id')->get();
            
                // // ->where('class_id',$request->class_id)->first();
                // return view('Fee_Details.EditFeeVoucher',compact('fee_detail','stu'));
                return redirect()->action('Fee_DetailsController@searchClass');
            }

          
            public function updateFee(Request $request,$id,$date)
            {
                //  dd($request->all());
                $student = DB::table('fee_details')
                ->where('student_id', $id)->where('due_date',$date)->first();
                // dd($student);
                if($student != null){
                 //    dd($request);
                     $student->status=$request->due_date;
                     $student->due_date=$request->due_date;
                
                    
                     $student->save();
                 //    dd($id);
                }
                return redirect('/');
            }


            public function Voucher($id,$feeid){
           

                $fee_detail=DB::table('fee_Details')
                  ->where('fees_id',$feeid)->first();
                //   dd($fee_detail);
                  $stu=DB::table('students')
                  ->join('parents','parents.parent_id','students.parent_id')
                 ->where('student_id',$id)->first();
            // dd($stu);
                   $fee=DB::table('fees')
                ->where('fee_id',$feeid)->first();
                    //  dd($fee);



            $pdf = PDF::loadView('Fee_Details.GenerateFeeVoucher',['fee_detail'=>$fee_detail,'stu'=> $stu,'fee'=> $fee]);
    // If you want to store the generated pdf to the server then you can use the store function
                 $pdf->save(storage_path().'_filename.pdf');
    // Finally, you can download the file using download function
                  return $pdf->download('feeVoucher.pdf');
               
            //   return view('Fee_Details.GenerateFeeVoucher',compact('fee_detail','stu','fee'));

            }
        
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
    public function fetchstudent($id){
        dd($id);

        if(request()->ajax())
        {
            $data = Student::where('student_id' , $id)
            ->get();
            // dd()
            return $data;

        } 
        
        return view('HR.view_student');
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
