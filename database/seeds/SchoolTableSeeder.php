<?php

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 ////////////////////////////////////Teacher///////////////////////////////           
//========>Create Salybus
DB::table('sidebar')->insert([
  'Name' => 'Create_Salybus',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Create_Salybus</span>
  </a>
  <ul class="sub">
  <li><a href="/new_syllabus">Create Syllabus</a></li>
  </ul>
</li>
    ',

]);
//=========>Lecture Managment
DB::table('sidebar')->insert([
  'Name' => 'Lectures_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Lectures_Management</span>
  </a>
  <ul class="sub">
  <li><a href="/new_lectures">Add Lectures</a></li>
  <li><a href="/view_lecture">View Lectures</a></li>
  </ul>
</li>
    ',

]);
//=========>View_Lectures
DB::table('sidebar')->insert([
  'Name' => 'View_Lectures',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>View_Lectures</span>
  </a>
  <ul class="sub">
  <li><a href="/lect_view">Lecture View</a></li>
  </ul>
</li>
    ',

]);
//====>Home work
DB::table('sidebar')->insert([
  'Name' => 'Add_Home_Work',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Add_Home_Work</span>
  </a>
  <ul class="sub">
  <li><a href="/new_homework">Add Home Work</a></li>
  <li><a href="/check_homework">View Home Work</a></li>
  </ul>
</li>
    ',

]);
//========>View Home  Work
DB::table('sidebar')->insert([
  'Name' => 'View_Home_Work',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>View_Home_Work</span>
  </a>
  <ul class="sub">
  <li><a href="/check_homework">View Home Work</a></li>
  </ul>
</li>
    ',

]);
//========>Student Attendence
DB::table('sidebar')->insert([
  'Name' => 'Student Attendance',
  'SideBarMenu' => '

  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-users"></i>
  <span>Student_Attendance</span>
  </a>
  <ul class="sub">
  <li><a href="/mark_attendance">Mark Attendance</a></li>
  <li><a href="/attendance/view_attendance">View Attendance</a></li>
 
  </ul>
</li>
    ',

]);
/////////////////////view attendence
DB::table('sidebar')->insert([
  'Name' => 'ViewStudent_Attendance',
  'SideBarMenu' => '

  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-users"></i>
  <span>ViewStudent_Attendance</span>
  </a>
  <ul class="sub">

  <li><a href="/attendance/view_attendance">View Attendance</a></li>
 
  </ul>
</li>
    ',

]);
//===Create Student Result
DB::table('sidebar')->insert([
  'Name' => 'Create_Student_Result',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Create_Student_Result</span>
  </a>
  <ul class="sub">
  <li><a href="/resultadd">Add Student Result</a></li>
  <li><a href="/resultview">View Results</a></li>
         
 
  </ul>
</li>
    ',

]);
//////////////////////////////////HR//////////////////////////////
//====>Employee
DB::table('sidebar')->insert([
  'Name' => 'Employee_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-users"></i>
  <span>Employee_Management</span>
  </a>
  <ul class="sub">
  <li><a href="/addemployee">Add New Employee</a></li>
   <li><a href="/viewemployee">View Employee</a></li>
 
  </ul>
</li>
    ',

]);
//====>Employee Attendance
DB::table('sidebar')->insert([
  'Name' => 'Employee_Attendance',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Employee_Attendance</span>
  </a>
  <ul class="sub">
  <li><a href="/save_attendance">Mark Employee Attendance</a></li>
  <li><a href="/showemployee_attendence">View Employee Attendance</a></li>
 
  </ul>
</li>
    ',

]);
//=========>Branch_Management
DB::table('sidebar')->insert([
  'Name' => 'Branch_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Branch_Management</span>
  </a>
  <ul class="sub">
  <li><a href="/addcity">Add City</a></li>
  <li><a href="/addarea">Add Area</a></li>  
  <li><a href="/addbranch">Add Branch</a></li>
  <li><a href="/viewbranch">View Branch</a></li>
  </ul>
</li>
    ',

]);

/////////////////////////////Accounts////////////////////////////////////////
//===>Set Fee Structure
DB::table('sidebar')->insert([
  'Name' => 'Set_FeeStructure',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Set_FeeStructure</span>
  </a>
  <ul class="sub">
  <li><a href="/fees/create">Set Fees Structure</a></li>
 
  </ul>
</li>
    ',

]);
//===>Student Fee
DB::table('sidebar')->insert([
  'Name' => 'Set_StudentFee',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Set_StudentFee</span>
  </a>
  <ul class="sub">
  <li><a href="/setfeesdetail/create">Set Students Fee</a></li>
  <li><a href="/fees">View Fees Structure</a></li>
  </ul>
</li>
    ',

]);
//=======>Generate Student Fee Challan
DB::table('sidebar')->insert([
  'Name' => 'StudentFeeChallan',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>StudentFeeChallan</span>
  </a>
  <ul class="sub">
  <li><a href="/searchclass">Generate Fee Challan </a></li>
  <li><a href="/fee_voucher/searchclass">View Fees Voucher</a></li>
   
  </ul>
</li>
    ',

]);

//=====>Employee Salary Managemnt
DB::table('sidebar')->insert([
  'Name' => 'Employee_Salary',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Employee_Salary</span>
  </a>
  <ul class="sub">
  <li><a href="/empsalary">Employee Salary</a></li>
  <li><a href="/ViewEmployeeSal">View Employee Salary</a></li>
  </ul>
</li>
    ',

]);
///////////////////////////////////	Admission/////////////////////////////
//=====>Student Managemnt
DB::table('sidebar')->insert([
  'Name' => 'Register_Student',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Register_Student</span>
  </a>
  <ul class="sub">
  <li><a href="/viewstudents">View Students</a></li>
  </ul>
</li>
    ',

]);
//======>Parent Information Management
DB::table('sidebar')->insert([
  'Name' => 'Register_Parent',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Register_Parent</span>
  </a>
  <ul class="sub">
  <li><a href="/parents">Add Parents Information</a></li>
  <li><a href="/parentinfo">View parents Information</a></li>
  </ul>
</li>
    ',

]);
///////////////////////////////////	Examination/////////////////////////////
//=====>Generate TimeTable
DB::table('sidebar')->insert([
  'Name' => 'Generate_TimeTable',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Generate_TimeTable</span>
  </a>
  <ul class="sub">
  <li><a href="/timetable">Create Exams Time Table</a></li>
  <li><a href="/viewtimetable">View Exams Time Table</a></li>
  
  </ul>
</li>
    ',

]);
//====>Generate Report Card
DB::table('sidebar')->insert([
  'Name' => 'Generate_ReporCard',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Generate_ReporCard</span>
  </a>
  <ul class="sub">
  <li><a href="/announceresult">Make Report Card</a></li>
  </ul>
</li>
    ',

]);

///////////////////////////////////Student/////////////////////////////

//====>Check Salybus
DB::table('sidebar')->insert([
  'Name' => 'View_Salybus',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>View_Salybus</span>
  </a>
  <ul class="sub">
  <li><a href="/check_syllabus">Syllabus</a></li>
  </ul>
</li>
    ',

]);

//===>View Report Card

DB::table('sidebar')->insert([
  'Name' => 'View_ReportCard',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>View_ReportCard</span>
  </a>
  <ul class="sub">
  <li><a href="/result">Check Your Result</a></li>
  </ul>
</li>
    ',

]);
//////////////////////////Parent/////////////////////////////
//===>School Leaving
DB::table('sidebar')->insert([
  'Name' => 'School_Leaving',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>School_Leaving</span>
  </a>
  <ul class="sub">
  <li><a href=" /applyforcert">Apply For School Transfer</a></li>
  <li><a href=" /viewAppStatus">View Application Status</a></li>
  </ul>
</li>
    ',

]);
//==>View Child Result
DB::table('sidebar')->insert([
  'Name' => 'Child_Result',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Child_Result</span>
  </a>
  <ul class="sub">
  <li><a href="/result_view">View Result</a></li>
  </ul>
</li>
    ',

]);
//View Child Attendence
DB::table('sidebar')->insert([
  'Name' => 'Child_Attendance',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-users"></i>
  <span>Child_Attendance</span>
  </a>
  <ul class="sub">
  <li><a href=" /attandance_view">View Attandence</a></li>
  </ul>
</li>
    ',

]);
//View Child Lecture
DB::table('sidebar')->insert([
  'Name' => 'Child_Lecture',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Child_Lecture</span>
  </a>
  <ul class="sub">
  <li><a href="/lect_view">Lecture View</a></li>
  </ul>
</li>
    ',

]);

//Class Management
DB::table('sidebar')->insert([
  'Name' => 'Classes_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-home"></i>
  <span>Classes_Management</span>
  </a>
  <ul class="sub">
  <li><a href="/class">Classes</a></li>
 
  </ul>
</li>
    ',

]);
//Subject Management
DB::table('sidebar')->insert([
  'Name' => 'Subject_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <ul class="sub">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Subject_Management</span>
  </a>
  <li><a href="/subjects">Subject</a></li>

  </ul>
</li>
    ',

]);
//Assign Subject To Teacher
DB::table('sidebar')->insert([
  'Name' => 'Assign_Subject',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Assign_Subject</span>
  </a>
  <ul class="sub">

  <li><a href="/assign">Assign Subjects</a></li>
  </ul>
</li>
    ',

]);
////////////////////Roles////////////////////////
DB::table('sidebar')->insert([
  'Name' => 'Roles_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Roles_Management</span>
  </a>
  <ul class="sub">

  <li><a href="/addroles">Add New Role</a></li>
  <li><a href="/viewroles">View Roles</a></li>
  <li><a href="/roleassign">Assign Roles</a></li>
  </ul>
</li>
    ',

]);
////////////////////Job Management//////////////////////////
DB::table('sidebar')->insert([
  'Name' => 'Job_Management',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Job_Management</span>
  </a>
  <ul class="sub">

  <li><a href="/addjob">Add Job</a></li>
  <li><a href="/viewjobs">View Job</a></li>
  </ul>
</li>
    ',

]);
//////////////////////////Leave Request////////////////////////////
DB::table('sidebar')->insert([
  'Name' => 'Leave_Requests',
  'SideBarMenu' => '
  <li class="sub-menu">
  <a href="javascript:;">
  <i class="fa fa-book"></i>
  <span>Leave_Requests</span>
  </a>
  <ul class="sub">

  <li><a href="/accept">View Requests</a></li>
  </ul>
</li>
    ',

]);

}}
