<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NumberToWords\NumberToWords;
use Carbon\Carbon;
use App\Student;
use App\Subject;
use App\Section;
use App\Classes;
use App\SubjectTeacher;
use DB;
use PDF;

class StudentController extends Controller
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
      $classes = Classes::all();
    //   foreach($classes as $class){
    //   dd($class->class_name);
    //   }
       return view('Classes.add_classes', compact('classes'));
    }
    
    public function subjectindex()
    {
        // dd('as');
      $subject = Subject::all();
    //   foreach($classes as $class){
    //   dd($class->class_name);
    //   }
       return view('Classes.add_subject', compact('subject'));
    }
   
    public function sectionindex()
    {
        // dd('as');
      $section = Section::all();
    //   foreach($classes as $class){
    //   dd($class->class_name);
    //   }
       return view('Classes.add_section', compact('section'));
    }

    public function fetchsubject($id){
        

        if(request()->ajax())
        {
            $data = Subject::where('subject_id',$id)
            ->get();
            return $data;
        } 
        // dd($subject);

        return view('Classes.add_subject');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('as');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createsubjects(Request $request){
        // dd($request->all());
        $class=DB::table('subjects')
        ->where('subject_name',$request->subject_name)->where('class_id',$request->class_id)->first();
        if($class=='')
          {
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
    else{
        toastr()->error('Already Exists');
        return redirect()->back();

    }
}

    public function updatesubject(Request $request){
        $update = Subject::where('subject_id',$request->subject_id)->first();
        if($update != null){
            $update->subject_name = $request->subject_name;
            $update->save();
        }
        $subject = Subject::all();
        //   foreach($classes as $class){
        //   dd($class->class_name);
        //   }
           return view('Classes.add_subject', compact('subject'));
    }

    // public function createsection(Request $request){
    //     // dd($request);
    //     $create = new Section();
    //     $create->section_name = $request->section_name;
    //     $create->save();
        
    //     $section = Section::all();
    // //   foreach($classes as $class){
    // //   dd($class->class_name);
    // //   }
    //    return view('Classes.add_section', compact('section'));

    // }

    // public function fetchsection($id){
        

    //     if(request()->ajax())
    //     {
    //         $data = Section::where('section_id',$id)
    //         ->get();
    //         return $data;
    //     } 
    //     // dd($subject);

    //     return view('Classes.add_section');

    // }

    // public function updatesection(Request $request){
    //     $update = Section::where('section_id',$request->section_id)->first();
    //     if($update != null){
    //         $update->section_name = $request->section_name;
    //         $update->save();
    //     }
    //     $section = Section::all();
    //     //   foreach($classes as $class){
    //     //   dd($class->class_name);
    //     //   }
    //        return view('Classes.add_section', compact('section'));
    // }

    public function store(Request $request)
    {
      
    }

    public function createclass(Request $request){
        // dd($request->all());
        $class=DB::table('classes')
        ->where('class_name',$request->class_name)->where('section',$request->section)->first();
        if($class=='')
          {

    $create = new Classes();
    $create->class_name = $request->class_name;
    $create->section = $request->section;
    $create->save();
    
    $classes = Classes::all();
//    return $this->index();
   return view('Classes.add_classes', compact('classes'));
             }
             else{
                toastr()->error('Already Exists');
                return redirect()->back();
            
             }
    }

    public function fetchclasses($id){
        // dd($id);
        if(request()->ajax())
        {
            $data = Classes::where('class_id',$id)
            ->get();
            return $data;
        } 
        // dd($subject);

        return view('Classes.add_classes');

    }

    public function updateclass(Request $request){
        // dd($request);
        $update = Classes::where('class_id',$request->class_id)->first();
        // dd($update);
        if($update != null){
            // $update->class_id = $request->class_id;
            $update->class_name = $request->class_name;
            $update->subject_id = $request->subject_id;
            $update->save();
        }
        // dd('as');
        $classes = DB::table('classes')
        ->join('subjects','subjects.subject_id','=','classes.subject_id')
        ->select('classes.*','subjects.*')
        ->get();
           return view('Classes.add_section', compact('classes'));
    }
    
    

    public function assignsubject(){
        $subjectteacher = DB::table('subject_teachers')
        ->join('employees','employees.employee_id','=','subject_teachers.teacher_id')
        ->join('subjects','subjects.subject_id','=','subject_teachers.subject_id')
        ->select('subject_teachers.*','employees.*','subjects.*')
        ->get();
        return view('Classes.assign_subjects', compact('subjectteacher'));
    }


        public function assigned(Request $request){


        $class=DB::table('subject_teachers')
        ->where('subject_id',$request->subject_id)->where('teacher_id',$request->teacher_id)->where('year',$request->year)->first();
        // dd( $class);
        if($class=='')
          {
                    //   dd($request->all());
            //   dd('ab');
        $assigned = new SubjectTeacher();
        // dd($assigned);
        $assigned->subject_id = $request->subject_id;
        $assigned->teacher_id = $request->teacher_id;
        $assigned->year = $request->year;
        // dd($assigned->all());
        $assigned->save();

        // dd($request);
       return $this->assignsubject();
    }
    else{
        toastr()->error('Already Exists');
        return redirect()->back();
        
    }
}

    public function homework(){
        $data=DB::table('roles')
        ->where('id',Auth::user()->role_id)->first();
        // dd($data);
        if($data->name=='Admin')
        {
            $home = DB::table('homeworks')
            ->get();
            return view('students.homework',compact('home'));

            }
            else if($data->name=='Student')
        $home = DB::table('students')
        ->join('subjects','subjects.class_id', '=' , 'students.student_class_of_admission')
        ->join('homeworks','homeworks.subject_id' , '=' , 'subjects.subject_id')
        ->select('students.*','subjects.*','homeworks.*')
        ->get();
        
        return view('students.homework',compact('home'));
    }

    public function lectures(){
        $lecture = DB::table('students')
        ->join('subjects','subjects.class_id', '=' , 'students.student_class_of_admission')
        ->join('lectures','lectures.subject_id' , '=' , 'subjects.subject_id')
        ->select('students.*','subjects.*','lectures.*')
        ->get();
        // dd($lecture->all());
        return view('students.lecture',compact('lecture'));
    }

    public function syllabus(){

    $data=DB::table('roles')
    ->where('id',Auth::user()->role_id)->first();
    // dd($data);
    if($data->name=='Admin')
    {
    //     $id = Auth::user()->id;
        $syllabus = DB::table('syllabi')
        ->get();
        
        return view('students.syllabus',compact('syllabus'));
    }
        else{
            $id = Auth::user()->id;
            $syllabus = DB::table('students')
            ->join('subjects','subjects.class_id', '=' , 'students.student_class_of_admission')
            ->join('syllabi','syllabi.subject_id' , '=' , 'subjects.subject_id')
            ->select('students.*','subjects.*','syllabi.*')
            ->where('students.user_id',$id)
            ->get();
            // dd($syllabus);
            return view('students.syllabus',compact('syllabus'));
        }
      
       
    }

    public function result(){



        $id = Auth::user()->id;
    //    dd($id);
        $results = DB::table('result')
        ->join('students','students.student_id' , '=' , 'result.student_id')
        ->where('students.user_id',$id)
        // ->where('results.status_report',1)
        // ->where()
        ->get();
    //    dd($results);
        if($results->isEmpty())
        {
            // dd('abc');
            toastr()->error('Result Uploaded Soon');
            return redirect()->back();
        }
        else{
            $marks = $results->sum('marks');
            $obtain_marks = $results->sum('obtain_marks');
            if ($marks != 0) {
                $percent = $obtain_marks / $marks * 100;
                } else {
                $percent = 0;
                }
    
            // dd($result);
            
            return view('students.check_result',compact('results','marks','obtain_marks','percent'));

        }
        
      
    }

    public function getchallan(){
        $date = Carbon::now()->format('yy-m-d');
        // dd($date);
        $numberToWords = new NumberToWords();
        $id = Auth::user()->id;
        $genrateslip = DB::table('fee_details')
        ->join('fees','fees.fees_id', '=' , 'fee_details.fees_id')
        ->join('students','students.student_id', '=' ,'fee_details.student_id')
        ->select('fee_details.*','fees.*','students.*')
        ->where('students.user_id',$id)
        ->get();
        // dd($genrateslip->current_ammount);
        // dd($genrateslip[0]->current_ammount);
        $numberTransformer = $numberToWords->getNumberTransformer('en');
       $amountinwords = $numberTransformer->toWords($genrateslip[0]->current_ammount);
        return view('students.get_challan',compact('date','genrateslip','amountinwords'));
    }

    public function pdfview(Request $request)
    {
        $date = Carbon::now()->format('yy-m-d');
        // dd($date);
        $numberToWords = new NumberToWords();
        $id = Auth::user()->id;
        $genrateslip = DB::table('fee_details')
        ->join('fees','fees.fees_id', '=' , 'fee_details.fees_id')
        ->join('students','students.student_id', '=' ,'fee_details.student_id')
        ->select('fee_details.*','fees.*','students.*')
        ->where('students.user_id',$id)
        ->get();
        // dd($genrateslip->current_ammount);
        // dd($genrateslip[0]->current_ammount);
        $numberTransformer = $numberToWords->getNumberTransformer('en');
       $amountinwords = $numberTransformer->toWords($genrateslip[0]->current_ammount);
    //    view('students.pdfview',compact('date','genrateslip','amountinwords'));
       view()->share('date',$date);
       view()->share('amountinwords',$amountinwords);
       view()->share('genrateslip',$genrateslip);
    //    view()->share('date',$date);
        // dd('asd');
        // $items = DB::table("items")->get();
        // view()->share('items',$items);

        if($request->has('download')){
            // dd('ads');
            $pdf = PDF::loadView('students.pdfview');
            return $pdf->download('pdfview.pdf');
        }

        return view('students.pdfview');
    }

    public function feestatus(){
        $id = Auth::user()->id;
        $checkstatus = DB::table('fee_details')
        ->join('fees','fees.fees_id', '=' , 'fee_details.fees_id')
        ->join('students','students.student_id', '=' ,'fee_details.student_id')
        ->select('fee_details.*','fees.*','students.*')
        ->where('students.user_id',$id)
        ->get();

        // dd($checkstatus);
        return view('students.fee_status',compact('checkstatus'));
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
