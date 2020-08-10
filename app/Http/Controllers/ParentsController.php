<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
// use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use DB;
use App\Parents;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Parents.register_parent');
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
      $father_email=DB::table('users')
      ->where('email', $request->father_email)->first();
      
      // dd($father_email);
             if($father_email!=null){
               //  dd('bb');
             toastr()->error('Email Address  Exist');
            return redirect()->back();

            }
            $father_cnic=DB::table('parents')
            ->where('father_cnic', $request->father_cnic)->first();
            // dd($father_email);
         if($father_cnic!=null){
                   toastr()->error('Father Cnic already  Exist');
                  return redirect()->back();
      
                  }

          $father_phone_number=DB::table('parents')
          ->where('father_phone_number', $request->father_phone_number)->first();
          if($father_cnic!=null){
           toastr()->error('Father phone Number already  Exist');
          return redirect()->back();
        
                    }
                    
          $mother_email=DB::table('users')
          ->where('email', $request->mother_email)->first();
          if($mother_email!=null){
           toastr()->error('mother_email  already  Exist');
          return redirect()->back();
        
                    }
                    
          $mother_cnic=DB::table('parents')
          ->where('mother_cnic', $request->mother_cnic)->first();
          if($mother_cnic!=null){
           toastr()->error('	mother_cnic already  Exist');
          return redirect()->back();
        
                    }
                              
                    $mother_phone_number=DB::table('parents')
          ->where('mother_phone_number', $request->mother_phone_number)->first();
          if($mother_phone_number!=null){
           toastr()->error('mother_phone_number already  Exist');
          return redirect()->back();
        
                    }
               

      // ->where('father_cnic',$request->father_cnic)->where('mother_email',$request->mother_email)->where('mother_cnic',$request->mother_cnic)->where('father_phone_number',$request->father_phone_number)->where('mother_phone_number',$request->mother_phone_number)->get();
      
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
            toastr()->success('Parents Added Succesfully');
            return redirect()->back();
            // return redirect('/');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resultView(){

        $email = Auth::user()->email;
     //    dd( $email);
        $parrent_id= DB::table('parents')
     //    ->select('parent_id')
        ->where('father_email',$email)->first();
     //    dd($parrent_id);
        $student=DB::table('students')
        ->select('student_id','student_name','student_class_section')
        ->where('parent_id',$parrent_id->parent_id)->first();
         // dd($student_id->student_name);
        $student_result=DB::table('results')
        ->select('exam','year','student_id','marks','obtain_marks','promoted')
        ->where('student_id',$student->student_id)->get();
        // dd($student_result);
        return view('Parents.view_StudentResult',compact('student_result','student'));

     }

     public function viewtimetable(){
      $email = Auth::user()->email;
      //    dd( $email);
         $parrent_id= DB::table('parents')
      //    ->select('parent_id')
         ->where('father_email',$email)->first();
      //    dd($parrent_id);
         $student=DB::table('students')
         ->select('student_id','student_name','student_class_of_admission')
         ->where('parent_id',$parrent_id->parent_id)->first();
            // dd($student);
            // $res=DB::table('subjects')
            // ->select('subject_id','subject_name')
            // ->where('class_id',$student->student_class_of_admission)->get();
            // // dd($res);
            // $abc=count($res);

            // for()
            $timetable=DB::table('time_tables')
         ->select('yearofexam','exam','date','start_time','end_time')
         ->where('class_id',  $student->student_class_of_admission)->get();
         //   dd( $timetable);
           $subj=DB::table('subjects')
           ->select('subject_id','subject_name')
           ->where('class_id',$student->student_class_of_admission)->first();
            //  dd($subj);

         return view('Parents.viewTimetable',compact('timetable','student','subj'));


     }

     public function viewLecture(){


      $data=DB::table('roles')
      ->where('id',Auth::user()->role_id)->first();
    
    if($data->name=='Admin')
    {
    //     $id = Auth::user()->id;
        $res= DB::table('lectures')
        ->get();
        
        return view('Parents.view_stulectures',compact('res'));
    }
    else if($data->name=='Student'){
      $res= DB::table('lectures')
      ->join('subjects','subjects.subject_id','lectures.subject_id')
      ->join('students','students.student_class_of_admission','subjects.class_id')
      ->get();
      // dd($res);
         return view('Parents.view_stulectures',compact('res'));

    }
    else if($data->name=="Parent"){
      $res= DB::table('lectures')
      ->join('subjects','subjects.subject_id','lectures.subject_id')
      ->join('students','students.student_class_of_admission','subjects.class_id')
      ->get();
      return view('Parents.view_stulectures',compact('res'));
    }
   }
    
         
         public function viewSubjectLecture($id)
         {
            
               $res=DB::table('subject_teachers')
             ->where('subject_id',$id)->first();
           
              
               $lect_name=DB::table('lectures')
               ->select('lecture','lecture_name')
               ->where('subject_id',$res->subject_id)->where('user_id',$res->teacher_id)->get();
               
            return view('Parents.view_sublectures',compact('lect_name'));

     }
     public function searchresult(Request $request){
        $email = Auth::user()->email;
        //    dd( $email);
           $parrent_id= DB::table('parents')
        //    ->select('parent_id')
           ->where('father_email',$email)->first();
        //    dd($parrent_id);
           $student=DB::table('students')
           ->select('student_id','student_name')
           ->where('parent_id',$parrent_id->parent_id)->first();
            // dd($student_id->student_name);
           $student_result=DB::table('results')
           ->select('exam','year','student_id','marks','obtain_marks','promoted')
           ->where('student_id',$student->student_id)->where('year',$request->year)->get();
        //    dd($student_attandence);
           return view('Parents.view_StudentResult',compact('student_result','student'));

    }

    public function attandanceView(){

               $email = Auth::user()->email;
            //    dd( $email);
               $parrent_id= DB::table('parents')
            //    ->select('parent_id')
               ->where('father_email',$email)->first();
            //    dd($parrent_id);
               $student=DB::table('students')
               ->select('student_id','student_name')
               ->where('parent_id',$parrent_id->parent_id)->first();
                // dd($student_id->student_name);
               $student_attandence=DB::table('student_attendances')
               ->select('student_id','date','status')
               ->where('student_id',$student->student_id)->get();
            //    dd($student_attandence);
               return view('Parents.view_studentAttandence',compact('student_attandence','student'));
 
            }
            public function search(Request $request){
                $email = Auth::user()->email;
                //    dd( $email);
                   $parrent_id= DB::table('parents')
                //    ->select('parent_id')
                   ->where('father_email',$email)->first();
                //    dd($parrent_id);
                   $student=DB::table('students')
                   ->select('student_id','student_name')
                   ->where('parent_id',$parrent_id->parent_id)->first();
                    // dd($student_id->student_name);
                   $student_attandence=DB::table('student_attendances')
                   ->select('student_id','date','status')
                   ->where('student_id',$student->student_id)->where('date',$request->date)->get();
                //    dd($student_attandence);
                   return view('Parents.view_studentAttandence',compact('student_attandence','student'));

            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    public function viewparent(Request $request)
    {
        // dd($request);
        $parent = Parents::all();
        
        return view('HR.view_parent',compact('parent'));
    }
    
    public function editparent($id){
        // dd($id);
        $parent = Parents::where('parent_id', $id)->get();
        // dd($parent);
        return view('HR.edit_parent',compact('parent'));
    }
}
