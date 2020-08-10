<?php

namespace App\Http\Controllers;

use App\Job;
use DB;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('HR.addjob');
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
        // dd( $request->all());
        $detail=DB::table('jobs')
        ->where('job_Name',$request->job_Name)->get();
        // dd($Detail);
    
        if($detail->isEmpty()){
          $data=$request->all([
            'job_Name',
            'dept_id',
            
            
        ]);
        // dd( $data);
        Job::create($data);
        toastr()->success('Created Succesfully');
            return View('HR.addjob',compact('data'));
          }
          else{
            toastr()->error('Already Exists');
            return redirect()->back();

          }
    }
    public function viewjobs()
    {
        // $students = Student::all();
        
        // // foreach ($students as $student) {
            // //     # code...
            // //     // $parent = Parents::where('father_cnic',$student->parent_cnic)->orwhere('mother_cnic',$student->parent_cnic)->get();
            // //     // dd($parent);
            // // }
        
        $jobs= Job::all();

        $dept=DB::table('departments')
        ->join('jobs','jobs.dept_id','departments.dept_id')
        ->select('departments.*','jobs.*')->get();

        //  dd($dept);
        
        return view('HR.view_jobs',compact('dept'));
            

            // dd($students);
            

        

            // Student::all();
        
       
    }    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dept=Job::where('job_id',$id)->get();
        return view('HR.edit_job', compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $job=DB::table('jobs')
        ->where('job_id',$id)->update(

            [
            'job_Name'=>$request->job_Name,
            'dept_id'=>$request->dept_id,
            ]
        );
        // dd($job);
        // $job = Job::where('job_id', $id)->get();
        // dd($job);
       
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function deletejob($id)
    {
        // dd($id);
        
        Job::find($id)->delete();
        // $this->view_jobs();
        toastr()->error('Deleted Succesfully');
        return redirect()->back();
      
    }
}
