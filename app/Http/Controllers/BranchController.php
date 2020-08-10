<?php

namespace App\Http\Controllers;
use App\Branch;

use Illuminate\Http\Request;
use DB;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('HR.add_branch');
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
        //   dd($request->all());

        $detail=DB::table('branch')
        ->where('branch_name',$request->branch_name)->where('address',$request->address)->get();
        // dd($Detail);
    
        if($detail->isEmpty()){
          $data=$request->all([
            'branch_name',
            'address',
            'tel-no',
            'area_id',
            
        ]);
        // dd( $data);
        Branch::create($data);
        toastr()->success('Created Succesfully');
            return View('HR.add_branch');
          }
          else{
            toastr()->error('Already Exists');
            return redirect()->back();

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
    public function viewbranch()
    {
        // $students = Student::all();
        
        // // foreach ($students as $student) {
            // //     # code...
            // //     // $parent = Parents::where('father_cnic',$student->parent_cnic)->orwhere('mother_cnic',$student->parent_cnic)->get();
            // //     // dd($parent);
            // // }
        
        $branchess = Branch::all();
        //  dd($branchess->all());
        
        return view('HR.view_branch',compact('branchess'));
            

            // dd($students);
            

        

            // Student::all();
        
       
    }

    public function fetchbranch($id)
    {
        if(request()->ajax())
        {
            $data = Student::where('branch_id' , $id)
            ->get();
            // dd( $data);
            return $data;


        } 
        
        return view('HR.view_branch');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::where('branch_id',$id)->get();
        return view('HR.edit_BRANCH', compact('branch'));
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
        $branch = Branch::where('branch_id', $id)->first();
        if($branch != null){
            // dd($request->all());
             $branch->branch_name    = $request->branch_name;
             $branch->address = $request->address;
             $branch->area_id     = $request->area_id;
            
             $branch->save();
            // dd($branch->address);
        }
        return redirect('/');
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
