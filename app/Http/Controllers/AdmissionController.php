<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Employee;
use App\Parents;
// use App\Hash;
use App\Fee;
use App\Branches;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
use Auth;
use App\Transfer;
use App\User;
use DB;
// use Hash;
use Validator;
use App\TransferEmployee;
use App\SchoolLeaving;
class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admission.register_student');
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
            
        return View('Admission.transferbranch');
     
    }
    public function transfer (Request $request){
         dd($request->all());
        $data=$request->all([
            'employee_id',
            'transfer_Reqdate',
            'Reason',
            'From_Campus',
            'To_Campus',
            'transfer_date'
           
        ]);
        Transfer::create($data);
    }
        public function schoolleaving(){
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
                
            return View('Admission.school_leavingCert');
         
        }
        public function schoolleave (Request $request){
            //  dd($request->all());
            $data=$request->all([
                'student_id',
                'Date',
                'Certificate',
              
            ]);
 
            SchoolLeaving::create($data);
            
        return View('Admission.school_leavingCert');
     
    }
          public function addstudent(Request $data)
    {
                //   dd($data->all());
                 $role=DB::table('roles')
                ->select('id')
                 ->where('name',"Student")->first();
                 $email=DB::table('users')
                 ->select('email')
                 ->where('email',$data->student_email)->first();
                //  dd($email);
 
                      if($email==''){

                     User::create([
                    'name' => $data['student_name'],
                    'email' => $data['student_email'],
                    'password' => Hash::make($data['password']),
                    'role_id'=>$role->id,
                    ]);
                }
                else
                {
                    toastr()->error('user already  Exist');
                    return redirect()->back();
                }

                $roll_number=DB::table('students')
                ->where('student_roll_no', $data->student_roll_no)->first();
                if($roll_number!=null){
                toastr()->error('Roll Number already  Exist');
                return redirect()->back();
         
        }
                $phone_No=DB::table('students')
               ->where('student_phone_number', $data->student_phone_number)->first();
                 if($phone_No!=null){
                 toastr()->error('phone  Number already  Exist');
                return redirect()->back();
      
             }
        
        $register_user = User::select('*')->where('name' , $data['student_name'])->where('role_id' ,  $data['role_id'])->first();
        DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$register_user->role_id, $register_user->id]);
          $data2=$data->all([
                'student_name',
               
                'student_email',
                'student_roll_no',
                'student_gender',
                'student_dob',
                'student_blood_group',
                'student_nationality',
                'student_religion',
                'student_address',
                'student_phone_number',
                'student_date_of_admission',
                'student_class_of_admission',
                'student_previous_school',
                'student_disability',
                 'parent_id'   
            ]);
           
            // $data->student_name = $data->input('student_name');
            // $data->father_name = $data->input('father_name');
            // $data->parent_cnic = $data->input('parent_cnic');
            // $data->student_email = $data->input('student_email');
            // $data->student_roll_no = $data->input('student_roll_no');
            // $data->student_gender = $data->input('student_gender');
            // $data->student_dob = $data->input('student_dob');
            // $data->student_blood_group = $data->input('student_blood_group');
            // $data->student_nationality = $data->input('student_nationality');
            // $data->student_religion = $data->input('student_religion');
            // $data->student_address = $data->input('student_address');
            // $data->student_phone_number = $data->input('student_phone_number');

            if($data->hasfile('student_pic_path')){
                $file=$data->file('student_pic_path');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads/employee/', $filename);
                $data->student_pic_path= $filename;
            }
            else{
                $student->student_pic_path='';
            }
            // $data->student_date_of_admission = $data->input('student_date_of_admission');
            // $data->student_class_of_admission = $data->input('student_class_of_admission');
            // $data->student_class_section = $data->input('student_class_section');
            // $data->student_previous_school = $data->input('student_previous_school');
            // $data->student_disability = $data->input('student_disability');
            // $data->user_id = $register_user->id;
            // $data->parent_id= $data->input('parent_id');
            // dd($data);
            // $data->save();
            Student::create($data2+['student_pic_path'=>'student_pic_path','user_id'=>$register_user->id]);
            toastr()->success('Student Registered Succesfully');
            return redirect()->back();
         
        }
       
    public function viewstudent()
    {
        
            $students = DB::table('parents')
            ->rightjoin('students','students.parent_id','=','parents.parent_id')
            ->select('parents.*','students.*')
            ->get();
            
        return view('HR.view_student',compact('students'));
    }
    public function fetchstudent($id)
    {
        if(request()->ajax())
        {
            $data = Student::where('student_id' , $id)
            ->get();
            return $data;
        } 
        
        return view('Admission.view_student');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('Admission.edit_student', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )

    {
        // dd($request->all());
        // $validatedData = Validator::make($request->all(),[
        //     'student_name'=>'bail|required|max:255|string',
        //     'student_roll_no'=>'required',
        //     'father_name '=>'required',
        //     'parent_cnic'=>'required|unique:students|Integer',
        //     'student_email'=>'required|unique:students|email',
        //     'student_gender'=>'required',
        //     'student_dob'=>'required',
        //     'student_blood_group'=>'required|max:255|string',
        //     'student_nationality'=>'required|max:255|string',
        //     'student_religion'=>'required|max:255|string',
        //     'student_address'=>'required|max:255|string',
        //     'employee_phone_number'=>'required|integer',
        //     'student_date_of_admission'=>'required',
        //     'student_class_section'=>'required',
        //     'student_previous_school'=>'required',
        //     'student_disability'=>'required',
       

        // ]);
                   $role=DB::table('roles')
                    ->select('id')
                     ->where('name',"Student")->first();
//   dd($role->id);
                 $email=DB::table('users')
                 ->select('email')
                 ->where('email',$request->student_email)->first();
// dd($email);
               if($email==''){
    // dd('abc');
                     User::create([
                        'name' => $request['student_name'],
                         'email' => $request['student_email'],
                        'password' => Hash::make($request['password']),
                         'role_id'=>$role->id,
                        ]);

                        $roll_number=DB::table('students')
                        ->where('student_roll_no', $request->student_roll_no)->first();
                        if($roll_number!=null){
                         toastr()->error('Roll Number already  Exist');
                        return redirect()->back();
                      
                     }
                     $phone_No=DB::table('students')
                     ->where('student_phone_number', $request->student_phone_number)->first();
                     if($phone_No!=null){
                      toastr()->error('phone  Number already  Exist');
                     return redirect()->back();
                   
                  }
                                  
        $register_user = User::select('*')->where('name' , $request['student_name'])->where('role_id',$role->id)->first();
        DB::insert('INSERT into role_user(role_id , user_id ) values(? , ?)' , [$register_user->role_id, $register_user->id]);
            
        // if($validatedData->fails()){
                  
        //     return redirect('/student/{id}/edit')->withErrors($validatedData)->withInput();
        // }
                $student = Student::where('student_id', $id)->first();
                if($student != null){
                 //    dd($request);
                     $student->student_name    = $request->student_name;
                     $student->student_roll_no = $request->student_roll_no;
                     $student->father_name = $request->father_name;
                     $student->parent_cnic     = $request->parent_cnic;
                     $student->student_email   = $request->student_email;
                     $student->student_gender  = $request->student_gender;
                     $student->student_dob     = $request->student_dob;
                     $student->student_blood_group = $request->student_blood_group;
                     $student->student_nationality = $request->student_nationality;
                     $student->student_religion = $request->student_religion;
                     $student->student_address = $request->student_address;
                     $student->student_phone_number = $request->student_phone_number;
                     if($request->hasfile('student_pic_path')){
                        $file=$request->file('student_pic_path');
                        $extension=$file->getClientOriginalExtension();
                        $filename=time().'.'.$extension;
                        $file->move('uploads/employee/', $filename);
                        $student->student_pic_path= $filename;
                    }
                    else{
                        // return $request;
                        $student->student_pic_path='';
                    }
                    
                    
                     $student->student_date_of_admission = $request->student_date_of_admission;
                     $student->student_class_of_admission = $request->student_class_of_admission;
                     $student->student_class_section = $request->student_class_section;
                     $student->student_previous_school = $request->student_previous_school;
                     $student->student_disability = $request->student_disability;
                     $student->save();
                 //    dd($id);
                 return redirect('/');
                }
              
               }
                 else{
                   toastr()->error('Already Exists');
                   return redirect()->back();

                    }
    // dd('ab');
   
    
//   if($request->student_email)  

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
