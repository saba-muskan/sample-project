<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Student;
use PDF;
use DB;
use Illuminate\Support\Facades\Auth;
// use app\Certificate;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('Parents.applyForCertificate');
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
        //    dd($request->all());
         $data=$request->all([
            'parent_id',
            'student_id',
            'Description',
            'date',
            
        ]);
        Certificate::create($data+['status'=>'']);
        $stu = DB::table('students')
        ->select('students.*')
        ->where('student_id',$request->student_id)
        ->first();
        // dd($students);

        return View('Parents.leaving_Certificate',compact('stu'));
    }
    // // public function leavingindex(){
    //     return view('Parents.leaving_Certificate');
    // }
    public function certificate($student_id){
//  dd('abc');
        $user = Student::find($student_id);
        
        return view('Parents.pdf_view', compact('user'));
      }
  
    public function downloadPDF($student_id){
        $user = Student::find($student_id);
        // dd($user->all());
        $pdf = PDF::loadView('pdf_view', compact('user'));
        return $pdf->download('LeavingCertificate.pdf');
  
      }



      public function viewApplicationRequest(Request $request){

        // dd('saba');
        $id= Auth::id();
        // dd($id);
        $data=DB::table('certificate')
        ->where('parent_id',$id)->get();
        // dd($data);
// 
        // $fee=DB::table('fees')
        // ->where('student_id',$data[0]->student_id)->get();
        // dd($fee);
        return view('Parents.view_applicationStatus',compact('data'));






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
        
    }
    public function viewrequest(){
        $data=DB::table('certificate')
        ->where('status',' ')->get();
        return View('Parents.AcceptTransferApplication',compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request ,$id)
    {
       
         
    }
    public function approvestatus($id)
    {
        // dd($id);


        $status=DB::table('certificate')
        ->where('Certificate_id',$id)->update(

            [
            'status'=>'Approve',
           
            ]
        );
        toastr()->error('Updated Succesfully');
        return redirect()->back();
         
    }

    public function notapprovestatus($id)
    {
        
        $status=DB::table('certificate')
        ->where('Certificate_id',$id)->update(

            [
            'status'=>'Not-Approved',
           
            ]
        );
        toastr()->error('Updated Succesfully');
        return redirect()->back();
         
         
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
