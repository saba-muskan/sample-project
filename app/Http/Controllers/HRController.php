<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Employee;
use App\Parents;
use App\Fee;
use App\Branch;
use App\Transfer;
use DB;

use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
class HRController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'employee_name'=>['required'],
            'employee_designation'=>['required'],
             'employee_address'=>['required'],
             'branch_id'=>['required'],
             'employee_gender'=>['required'],
             'employee_cnic'=>['required'],
             'marital_status'=>['required'],
             'employee_phone_number'=>['required'],
             'employee_dob'=>['required'],
             'department'=>['required'],
             'password'=>['required'],
             'Qualification'=>['required'],
             'Attachments'=>['required'],
        ]);
    }

    public function index()
    {
        // dd('ok');
        return view('HR.register_Employee');
    }

    public function employeeindex()
    {

        // dd('ok');
        return view('HR.register_employee');
    }

    public function addnewemployee(){
        return view('HR.register_Employee');
    }

    public function transferindex(){
        //dd($request->);
        // $data=$request->all([
        //     'student_id',
        //     'transfer_Reqdate',
        //     'Reason',
        //     'From_Campus',
        //     'To_Campus',
        //     'transfer_date'
        // ]);
 
        // Transfer::create($data);
            
        return View('HR.transferbranch');
     
    }
    public function transfer (Request $request){
        // dd($request->all());
        $data=$request->all([
            'student_id',
            'trasfer_Reqdate',
            'Reason',
            'From_Campus',
            'To_Campus',
            'trasfer_date'
        ]);
 
        Transfer::create($data);
            
        return View('HR.transferbranch');
     
    }
   
   
    public function parentindex()
    {
        return view('HR.register_parent');
    }

    public function feesindex()
    {
        return view('HR.setfees');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // return redirect('/');                
    }
    public function store(Request $request){
        
        $validatedData = Validator::make($request->all(),[
            'employee_name'=>'bail|required|max:255|string',
            'employee_email'=>'required|unique:employees|email',
            'employee_phone_number'=>'required',
            'employee_hireDate'=>'required',
            'employee_cnic'=>'required|integer',
            'employee_dob'=>'required',
            'branch_id'=>'required',
            'Qualification'=>'required',
            'employee_gender'=>'required',
            'employee_address'=>'required',
            'marital_status'=>'required',
            
            
            ]);
            // dd('abc');
            if($validatedData->fails()){
                
                return redirect('/addemployee')->withErrors($validatedData)->withInput();
            }
            // dd($request->all());
        User::create([
            'name' => $request['employee_name'],
            'email' => $request['employee_email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);
         $register_user = User::select('*')->where('email' , $request['employee_email'])->where('role_id' ,  $request['role_id'])->first();
         DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$request['role_id'], $register_user->id]);
         
         

        $employee = new Employee();
        $employee->employee_name = $request->input('employee_name');
        $employee->employee_email = $request->input('employee_email');
        $employee->employee_designation = $request->input('employee_designation');
        $employee->marital_status = $request->input('marital_status');
        $employee->employee_address = $request->input('employee_address');
        $employee->employee_gender = $request->input('employee_gender');
        $employee->employee_cnic = $request->input('employee_cnic');
        $employee->employee_phone_number = $request->input('employee_phone_number');
        $employee->employee_hireDate = $request->input('employee_hireDate');
        $employee->employee_dob = $request->input('employee_dob');
        $employee->branch_id = $request->input('branch_id');
        $employee->Qualification = $request->input('Qualification');
        $employee->job_id = $request->input('role_id');
        // $employee->Image=$request->input('Image');
        
       if($request->hasfile('Image')){
           $file=$request->file('Image');
           $extension=$file->getClientOriginalName();
           $filename=time().'.'.$extension;
           $file->move('uploads/employee/', $filename);
           $employee->Image= $filename;
       }
       else{
        //    return $request;
           $employee->Image='';
       }
       if($request->hasfile('Attachments')){
        $file=$request->file('Attachments');
        $extension=$file->getClientOriginalName();
        $filename=time().'.'.$extension;
        $file->move('uploads/employee/', $filename);
        $employee->Attachments= $filename;
    }
    else{
        // return $request;
        $employee->Attachments='';
    }

        // dd($employee->Attachments);
        // $employee->Attachments = $request->input('Attachments');
        $employee->user_id = $register_user->id;
        $employee->dept_id = $request->input('department');
        $employee->save();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function addstudent(Request $data)
    {
        // dd($data);
        // dd($parent_id->parent_id);
        if (Parents::where('father_cnic', '=', $data->parent_cnic)->orwhere('mother_cnic', '=', $data->parent_cnic)->exists()){
            // dd('as');
            User::create([
                'name' => $data['student_name'],
                'email' => $data['student_email'],
                'password' => Hash::make($data['password']),
                'role_id' => $data['role_id'],
                ]);
                
                $register_user = User::select('*')->where('name' , $data['student_name'])->where('role_id' ,  $data['role_id'])->first();
                DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$register_user->role_id, $register_user->id]);
                
        $parent_id = Parents::where('father_cnic', '=', $data->parent_cnic)->orwhere('mother_cnic', '=', $data->parent_cnic)->first();
        $student = new Student();
        $student->student_name = $data->input('student_name');
        $student->father_name = $data->input('father_name');
        $student->parent_cnic = $data->input('parent_cnic');
        $student->student_email = $data->input('student_email');
        $student->student_roll_no = $data->input('student_roll_no');
        $student->student_gender = $data->input('student_gender');
        $student->student_dob = $data->input('student_dob');
        $student->student_blood_group = $data->input('student_blood_group');
        $student->student_nationality = $data->input('student_nationality');
        $student->student_religion = $data->input('student_religion');
        $student->student_address = $data->input('student_address');
        $student->student_phone_number = $data->input('student_phone_number');
        $student->student_pic_path = $data->input('student_pic_path');
        $student->student_date_of_admission = $data->input('student_date_of_admission');
        $student->student_class_of_admission = $data->input('student_class_of_admission');
        $student->student_class_section = $data->input('student_class_section');
        $student->student_previous_school = $data->input('student_previous_school');
        $student->student_disability = $data->input('student_disability');
        $student->user_id = $register_user->id;
        $student->parent_id = $parent_id->parent_id;
        $student->save();
        // return redirect('/');
        }
        return Redirect()->back()->withInput()->withErrors(['Parent Cnic Doesnt Exist']);
       
        
    }

    public function registeremployee(Request $request)
    {
       
       

        // dd($request->all());
        User::create([
            'name' => $request['employee_name'],
            'email' => $request['employee_email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);
        //UserRole
        


        $register_user = User::select('*')->where('email' , $request['employee_email'])->where('role_id' ,  $request['role_id'])->first();
         DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$register_user->role_id, $register_user->id]);
        // dd($register_user->id);
        $employee = new Employee();
        $employee->employee_name = $request->input('employee_name');
        $employee->employee_email = $request->input('employee_email');
        $employee->employee_designation = $request->input('employee_designation');
        $employee->marital_status = $request->input('marital_status');
        $employee->employee_address = $request->input('employee_address');
        $employee->employee_gender = $request->input('employee_gender');
        $employee->employee_cnic = $request->input('employee_cnic');
        $employee->employee_phone_number = $request->input('employee_phone_number');
        $employee->employee_hireDate = $request->input('employee_hireDate');
        $employee->employee_dob = $request->input('employee_dob');
        $employee->branch_id = $request->input('branch_id');
        $employee->dept_id = $request->input('dept_id');
        $employee->user_id = $register_user->id;
        // $employee->dept_id = $request->input('department');

        $employee->save();
        // return redirect('/');                                                                                                                                                                                                                                                                                                                                                                                                                                         
    }

  

    public function addparent(Request $request)
    {
        dd($request);
        User::create([
            'name' => $request['father_name'],
            'email' => $request['father_email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);

        $father_user = User::select('*')->where('name' , $request['father_name'])->where('role_id' ,  $request['role_id'])->first();
         DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$father_user->role_id, $father_user->id]);
        
         User::create([
            'name' => $request['mother_name'],
            'email' => $request['mother_email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);

        $mother_user = User::select('*')->where('name' , $request['mother_name'])->where('role_id' ,  $request['role_id'])->first();
        DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$mother_user->role_id, $mother_user->id]); 
        
        $parent = new Parents();
        $parent->father_name = $request->input('father_name');
        $parent->father_email = $request->input('father_email');
        $parent->father_phone_number = $request->input('father_phone_number');
        $parent->father_address = $request->input('father_address');
        $parent->father_cnic = $request->input('father_cnic');
        $parent->father_occupation = $request->input('father_occupation');
        $parent->father_annual_income = $request->input('father_annual_income');
        $parent->mother_name = $request->input('mother_name');
        $parent->mother_email = $request->input('mother_email');
        $parent->mother_phone_number = $request->input('mother_phone_number');
        $parent->mother_address = $request->input('mother_address');
        $parent->mother_cnic = $request->input('mother_cnic');
        $parent->mother_occupation = $request->input('mother_occupation');
        $parent->mother_annual_income = $request->input('mother_annual_income');
        $parent->father_user_id = $father_user->id;
        $parent->mother_user_id = $mother_user->id;
        $parent->save();
        return redirect('/');
    }

    // public function setfees(Request $request)
    // {
    //     // dd($request);
    //     $parent = new Fee();
        
    //     $parent->save();
    //     return redirect('/');
    // }

    public function viewstudent()
    {
        // $students = Student::all();
        
        // // foreach ($students as $student) {
            // //     # code...
            // //     // $parent = Parents::where('father_cnic',$student->parent_cnic)->orwhere('mother_cnic',$student->parent_cnic)->get();
            // //     // dd($parent);
            // // }
            $students = DB::table('parents')
            ->join('students','students.parent_id','=','parents.parent_id')
            ->select('parents.*','students.*')
            ->get();
            // dd($students);
            

        

            // Student::all();
        
        return view('HR.view_student',compact('students'));
    }

    public function viewemployee()
    {
        $employee = Employee::all();
        // dd($students);
        
        return view('HR.view_employee',compact('employee'));
    }

    public function viewparent(Request $request)
    {
        // dd($request);
        $parent = Parents::all();
        
        return view('HR.view_parent',compact('parent'));
    }
    
    public function fetchstudent($id)
    {
        if(request()->ajax())
        {
            $data = Student::where('student_id' , $id)
            ->get();
            return $data;
        } 
        
        return view('HR.view_student');
    }

    public function fetchparent($id)
    {
        // dd($id);
        if(request()->ajax())
        {
            $data = Parents::where('parent_id' , $id)
            ->get();
            // dd($data);
            return $data;
        } 
        
        return view('HR.view_student');
    }



    public function fetchemployee($id)
    {
        if(request()->ajax())
        {
            $data = Employee::where('employee_id' , $id)
            ->get();
            return $data;
        } 
        
        return view('HR.view_employee');
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
        $student = Student::where('student_id',$id)->get();
        return view('HR.edit_student', compact('student'));
    }
   
   
    public function editemployee($id)
    {
        // dd('as');
        $employee = Employee::where('employee_id',$id)->get();
        return view('HR.edit_employee', compact('employee'));
    }

    public function editparent($id){
        // dd($id);
        $parent = Parents::where('parent_id', $id)->get();
        // dd($parent);
        return view('HR.edit_parent',compact('parent'));
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
       $student = Student::where('student_id', $id)->first();
       if($student != null){
        //    dd($request);
            $student->student_name    = $request->student_name;
            $student->student_roll_no = $request->student_roll_no;
            $student->father_name     = $request->father_name;
            $student->parent_cnic     = $request->parent_cnic;
            $student->student_email   = $request->student_email;
            $student->student_gender  = $request->student_gender;
            $student->student_dob     = $request->student_dob;
            $student->student_blood_group = $request->student_blood_group;
            $student->student_nationality = $request->student_nationality;
            $student->student_religion = $request->student_religion;
            $student->student_address = $request->student_address;
            $student->student_phone_number = $request->student_phone_number;
            $student->student_pic_path = $request->student_pic_path;
            $student->student_date_of_admission = $request->student_date_of_admission;
            $student->student_class_of_admission = $request->student_class_of_admission;
            $student->student_class_section = $request->student_class_section;
            $student->student_previous_school = $request->student_previous_school;
            $student->student_disability = $request->student_disability;
            $student->save();
        //    dd($id);
       }
       return redirect('/');
    }


    public function updateemployee(Request $request, $id)
    {
       $employee = Employee::where('employee_id', $id)->first();
       if($employee != null){
        //    dd($request->all());
            $employee->employee_name    = $request->employee_name;
            $employee->employee_designation = $request->employee_designation;
            $employee->employee_address     = $request->employee_address;
            $employee->employee_gender     = $request->employee_gender;
            $employee->employee_cnic   = $request->employee_cnic;
            $employee->employee_phone_number  = $request->employee_phone_number;
            $employee->employee_hireDate     = $request->employee_hireDate;
            $employee->employee_dob = $request->employee_dob;
            $employee->employee_dob = $request->employee_dob;
            $employee->branch_id = $request->branch_id;
            $employee->Qualification=$request->Qualification;
            // $employee->Image=$request->input('Image');
            
           if($request->hasfile('Image')){
               $file=$request->file('Image');
               $extension=$file->getClientOriginalExtension();
               $filename=time().'.'.$extension;
               $file->move('uploads/employee/', $filename);
               $employee->Image= $filename;
           }
           else{
            //    return $request;
               $employee->Image='';
           }
           if($request->hasfile('Attachments')){
            $file=$request->file('Attachments');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/employee/', $filename);
            $employee->Attachments= $filename;
        }
        else{
            // return $request;
            $employee->Attachments='';
        }
    
            $employee->dept_id = $request->department;
            $employee->save();
        //    dd($id);
       }
       return redirect('/');
    }

    public function updateparent(Request $request, $id)
    {
        // dd('sa');
        $parent = Parents::where('parent_id', $id)->first();
        // dd($parent);
        if($parent != null){
            $parent->father_name         = $request->father_name;
            $parent->father_email        = $request->father_email;
            $parent->father_phone_number = $request->father_phone_number;
            $parent->father_address      = $request->father_address;
            $parent->father_cnic         = $request->father_cnic;
            $parent->father_occupation   = $request->father_occupation;
            $parent->father_annual_income = $request->father_annual_income;
            $parent->mother_name         = $request->mother_name;
            $parent->mother_email        = $request->mother_email;
            $parent->mother_phone_number = $request->mother_phone_number;
            $parent->mother_address      = $request->mother_address;
            $parent->mother_cnic         = $request->mother_cnic;
            $parent->mother_occupation   = $request->mother_occupation;
            $parent->mother_annual_income = $request->mother_annual_income;
            $parent->save();
            toastr()->success('Updated  Succesfully');
        //    dd($id);
       }
       return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


   public function fetch($id)
    {
    // dd($id);
    //  $select = $request->get('select');
    //  $value = $request->get('value');
    //  $dependent = $request->get('dependent');
    //  $data = DB::table('jobs')
    //    ->where($select, $value)
    //    ->groupBy($dependent)
    //    ->get();
    //  $output = '<option value="">Select '.ucfirst($dependent).'</option>';
    //  foreach($data as $row)
    //  {
    //   $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    //  }
    //  echo $output;
// dd($id);
    if(request()->ajax())
    {
        $data=DB::table('jobs')
        ->where('dept_id',$id)
        ->get();
        dd($data);
     return $data;
    }
    }
 
    public function deleteemployee($id)
    {
        //dd($id);
        
        Employee::find($id)->delete();
        $this->viewemployee();
        toastr()->error('Deleted Succesfully');
        return redirect()->back();
      
    }
}
