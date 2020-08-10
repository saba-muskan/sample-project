<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StudentAttendance;
use App\Lectures;
use App\Homework;
use App\Result;
use App\Syllabus;   
use DB;
class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('abbc');
       
        return View('Teachers.create_result');
    }
    public function viewresultindex(){
        $users = DB::table('results')->get();
        return View('Teachers.viewResult',compact('users'));
    }
public function createResult(Request $request){
//    dd($request->all());
  
    $user = DB::table('students')->select('student_class_of_admission')->where('student_id',$request->student_id)->first();
    // dd($user->student_class_of_admission);
    // $section= DB::table('sections')->select('section_id')->where('section_name',$user->student_class_section)->first();
    //  dd( $section);
    if($request->obtain_marks>$request->marks){
        // dd('abc');
        toastr()->warning('Invalid marks');
        return redirect()->back();
    }
    $result=$request->all([
        'subject_id',
        'year',
        'exam',
        'student_id',
        'marks',
        'obtain_marks',
        'promoted',
      
        
    ]);

    // dd( $result);
    Result::create($result+['class_id'=>$user->student_class_of_admission]);
    // dd( $data);
       toastr()->success('Record Added Succesfully');
       return redirect()->back();
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function markattendance()
    {
        
        return view('Teachers.search');
    }
    public function search(Request $request)
    {
        // dd($request->all());
        $students=DB::table('classes')
        ->join('students','students.student_class_of_admission','classes.class_id')
        ->where('class_id',$request->class_id)
        ->get();
        // dd( $students);
        if($students->isEmpty()){
            toastr()->warning('No Student Registerd In This Class');
            return redirect('/');
          
           
        }
        else{
            return view('Teachers.mark_attendance',compact('students'));
          
        }
        // dd($students);
    }
    public function createsubjects(Request $request){
        // dd($request);
        $create = new Subject();
        $create->subject_name = $request->subject_name;
        $create->class_id = $request->class_id;

        $create->save();
        
        $subject = DB::table('subjects')
        ->join('classes','classes.class_id','subjects.class_id')
        ->select('subjects.*','classes.*')
        ->get();
    //   foreach($classes as $class){
    //   dd($class->class_name);
    //   }
       return view('Classes.add_subject', compact('subject'));

    }


    public function saveattendance(Request $request)
    {
        // dd($request->all());
        $teacher_id = Auth::user()->id;
        $data = $request->all();
        // dd($data);
        // dd($data["class_id"]);
        // $count = count($request->student_id);
        // dd( $count);
        $now = Carbon::now();
        $date =$now->format('Y-m-d');
        // dd($date);
        $stu=DB::table('students')
        ->where('student_class_of_admission',$request->class_id)
        ->get();
        // dd($stu);
         $count = count($stu);
        //  dd($count);
        $att = DB::table('student_attendances')
        ->where('class_id',  $request->class_id) 
        // ->where('dept_id',  $request->dept_id[1])
        ->where('date',  $date)
        ->get();
        // dd($att);
        if($att->isEmpty()){
            // dd('asdsad');
            for($i = 1 ; $i <= $count ; $i++){
                $date = $now->toDateString();
                $done = StudentAttendance::create(['student_id'=>$data["student_id"][$i],'status' => $data["status"][$i],'date' => $date, 'class_id' => $data["class_id"][$i], 'roll_no' => $data["student_roll_no"][$i],'teacher_id' => $teacher_id ]);
            }
            toastr()->success('Attendance marked succesfully');
            return redirect('/mark_attendance');
        }
        else{
            // dd('asd');
            toastr()->warning('Attendance already taken');
            return redirect('/');
            //  return view('Teachers.mark_attendance');
            // return redirect()->back();
            // return redirect()->back();
        }
        
       
    }
    public function showattendance(Request $request)
        {
            
            $teacher_id = Auth::user()->id;
            // dd($teacher_id);

            $student=DB::table('students')
            ->where('user_id',$teacher_id)->first();

            // dd($student_id);
            // dd($request->all());
            
            // $data = DB::table('student_attendances')
            $data = DB::table('student_attendances')
            ->select('student_id','status','date')
            ->where('student_id',$student->student_id)
            ->where('date',$request->date)->distinct()->get(['date']);
            //   ->where('student_id' , $teacher_id)
        
        //    dd($data);
            //  $student_name=DB::table('students')
            //  ->select('student_name')
            //  ->where('student_id',$data["student_id"])
            //  ->get();
            // dd($student_name);
            // dd($data);
            return view('Teachers.show_attendance', compact('data'));
        }
    
   
    public function show()
        {
            $teacher_id = Auth::user()->role_id;
            // dd($teacher_id);
            if($teacher_id==1){
                $data = DB::table('student_attendances')
                ->where('teacher_id' , $teacher_id)
                ->distinct()->get(['date', 'class_id']);
                return view('Teachers.view_attendance', compact('data'));
            }
            elseif($teacher_id==5){
                $data = DB::table('student_attendances')
                ->where('student_id' , $teacher_id)
                ->distinct()->get(['date','class_id']);
                // dd($data);
                // ->distinct()->get(['date', 'class_id']);
                return view('Teachers.view_attendance', compact('data'));
            }
            elseif($teacher_id==2)
            $data = DB::table('student_attendances')->get();
            // ->distinct()->get(['date', 'class_id']);
            // dd( $data);
            return view('Teachers.view_attendance', compact('data'));

            }
          
        
        
    public function edit(Request $request)
        {
            // dd($request->all());
            $students = DB::table('student_attendances')
            ->join('classes','classes.class_id', '=' , 'student_attendances.class_id')
            ->join('students','students.student_id', '=' , 'student_attendances.student_id')
            ->select('student_attendances.*','classes.*','students.*')
            ->where('student_attendances.date',$request->date)
            ->where('student_attendances.class_id',$request->class_id)
            ->get();
            $date=$request->date;
            // dd($students);

            // $records = StudentAttendance::select('*')
            // ->where('date',$request->date)
            // ->where('class_id',$request->class_id)
            // // ->where('dept_id',$request->dept_id)
            // ->orderBy('date' , 'asc')
            // ->get();
            
            // foreach($records as $s){
                //     $students = DB::table('students')
                //     ->where('student_id',$s->student_id)
                //     ->get();
                // }
                // dd($students);
                return view('Teachers.edit_attendance', compact('students','date'));
        }

        
        public function update(Request $request)
        {
            // dd($request->all());
            $data = $request->all();
            //  dd($data['student_id']);
            $count = count($data["student_id"]);
           
            for($i=1 ; $i <= $count ; $i++){
               
                $attendee = StudentAttendance::all()
                ->where('student_id' , $data['student_id'][$i])
                ->where('date',$request->date)
                ->first();
                // dd($attendee);
                $student=DB::table('student_attendances')
                ->where('student_id',$data['student_id'][$i])
                ->where('date',$request->date)
                ->update([
                    'status'=>$data['status'][$i],
                ]);
                // $attendee->status = $data['status'][$i];
                
                // $attendee->comments = $data['comments'][$i];
                // $attendee->save();
            }
        
        return redirect('/');
    }
        
    public function markresult()
    {
       
       
        $result = DB::table('students')
      ->join('classes','classes.class_id', '=' , 'students.student_class_of_admission')
      ->join('subjects','subjects.class_id', '=' , 'students.student_class_of_admission')
      ->join('subject_teachers','subject_teachers.subject_id', '=' , 'subjects.subject_id')
      ->select('students.*','classes.*','subjects.*','subject_teachers.*')
      ->get();
    //   dd($result);
        
      return view('Teachers.viewresult',compact('result'));
    }

    public function createmarks(Request $result){
        // dd($result->all());
        $results = new Result();
       
        $results->subject_id = $result->subject_id;
        $results->year = $result->year;
        $results->student_id = $result->student_id;
        $results->marks = $result->marks;
        $results->obtain_marks = $result->obtain_marks;
        $results->exam = $result->exam;
        $results->status_report = 0;
        $result->promoted=$result->promoted;
        // dd($results->all());
        $results->save();

       return $this->markresult();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $id = Auth::user()->id;
        $lectures = new Lectures();
        $lectures->subject_id = $request->input('subject_id');
        $lectures->user_id = $id;
        $lectures->lecture_name = $request->input('lecture_name');

        if($request->hasfile('lecture')){
            $file = $request->file('lecture');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension;
            $file->move('uploads/lectures/' , $filename);
            $lectures->lecture = $filename;
        }else {
            $lectures->lecture = '';
        }
        $lectures->save();
        // dd('as');
        return redirect()->back();
    }

    public function view_lecture(){

        $id = Auth::user()->id;
        $lectures = Lectures::where('user_id',$id)->get();

        return view('Teachers.view_lectures',compact('lectures'));
    }

    public function createhomework(Request $request)
    {
        // dd($request);
        $id = Auth::user()->id;
        $homework = new Homework();
        $homework->subject_id = $request->input('subject_id');
        $homework->user_id = $id;
        $homework->homework = $request->input('homework');
        $homework->description = $request->input('description');
        $homework->start_date = $request->input('start_date');
        $homework->end_date = $request->input('end_date');

        if($request->hasfile('file_path')){
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension;
            $file->move('uploads/homework/' , $filename);
            $homework->file_path = $filename;
        }else {
            $homework->file_path = '';
        }
        $homework->save();
        // dd('as');
        return redirect()->back();
    }

    public function showsyllabus(){
        $id = Auth::user()->id;
        $syllabusshow = DB::table('syllabi')
        ->join('classes','classes.class_id','=','syllabi.class_id')
        ->join('subjects','subjects.subject_id','=','syllabi.subject_id')
        ->select('syllabi.*','classes.*','subjects.*')
        ->where('syllabi.user_id',$id)
        ->get();
        
        return view('Teachers.mark_syllabus',compact('syllabusshow'));
        // return view('')
    }

    
    public function createsyllabus(Request $request)
    {
        // dd($request);
        $id = Auth::user()->id;
        $syllabus = new Syllabus();
        $syllabus->subject_id = $request->subject_id;
        $syllabus->class_id = $request->class_id;
        $syllabus->exam = $request->exam;
        $syllabus->user_id = $id;
        $syllabus->status_syllabus = 0;

        if($request->hasfile('syllabus')){
            $file = $request->file('syllabus');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension;
            $file->move('uploads/syllabus/' , $filename);
            $syllabus->syllabus = $filename;
        }else {
            $syllabus->syllabus = $request->syllabus;
        }

        $syllabus->save();

        return $this->showsyllabus();

    }
}
