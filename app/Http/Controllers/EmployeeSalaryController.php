<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\EmployeeSalary;
use DB;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('Accounts.EmployeeSalary');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            
           $detail=DB::table('employeesalary')
           ->where('employee_id',$request->employee_id)->where('month',$request->month)->where('year',$request->year)->get();

           if($detail->isEmpty()){
            $grosspay= $request->basic_pay+$request->House_Allowance+$request->Medical_Allowance+$request->Transport_Allownace;
            $total_deduction=$request->Cp_Fund+$request->Medical_Contribution+$request->Income_Tax;
            // dd($total_deduction);
            // dd($grosspay);
            $netpay= $grosspay- $total_deduction;
           
            EmployeeSalary::create(['employee_id'=>$request->employee_id,'month'=>$request->month,'year'=>$request->year,'basic_pay'=>$request->basic_pay ,'House_Allowance'=> $request->House_Allowance, 'Medical_Allownace'=>$request->Medical_Allowance,'Transport_Allownace'=>$request->Transport_Allownace,'Gross_Pay'=>$grosspay,'Cp_Fund'=>$request->Cp_Fund,'Medical_Contribution'=>$request->Medical_Contribution,'Income_Tax'=>$request->Income_Tax,'Total_Deduction'=>$total_deduction,'Net_Pay'=>$netpay]);
            toastr()->success('Added Succesfully');
            return View('Accounts.EmployeeSalary');
        }
        else{
            toastr()->error('Already Exists');
            return redirect()->back();
        }


           }
           public function viewEmployeeSalary()
           {

               $empsalary = DB::table('employeesalary')
            // ->join('employeesalary','employeesalary.employee_id','employees.employee_id')
            // ->select('employeesalary.*','employees.*')
            ->get();
            // dd($empsalary);
               
               return view('Accounts.ViewEmployeesalary',compact('empsalary'));

                
              
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
