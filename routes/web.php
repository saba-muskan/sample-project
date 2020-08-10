<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/employees','EmployeeController');
Route::get('/', 'HomeController@index');

//=================== HR ======================== 
// Route::any('/student', 'HRController@index');
Route::any('/transfer','HRController@transferindex');
Route::any('/transfer/create','HRController@transfer');
Route::any('/employee', 'HRController@employeeindex');
//Route::any('/employee','HRController@updateemployee');
Route::any('/deleteemployee/{id}','HRController@deleteemployee');
Route::any('/parents', 'HRController@parentindex');
// Route::any('/addstudent', 'HRController@addstudent');
// Route::any('/addemployee', 'HRController@parentindex');\
Route::any('/addemployee', 'HRController@addnewemployee');
Route::resource('/addemployee', 'HRController');
Route::any('/addparent', 'HRController@addparent');
Route::any('/Employeeattendance/update', 'EmployeeAttendanceController@updateAttendence');
Route::resource('/save_attendance','EmployeeAttendanceController');
Route::any('/showemployee_attendence', 'EmployeeAttendanceController@showemployeeAttendence');
Route::any('/Employeeattendance/view_individual', 'EmployeeAttendanceController@showattendance');
Route::any('/Employeeattendancesearch/view_individual', 'EmployeeAttendanceController@search');
Route::any('/Employeeattendancesearchbydate/view_individual', 'EmployeeAttendanceController@searchbydate');
// Route::any('/Employeeattendance/edit', 'EmployeeAttendanceController@update');

// Route::any('/Employeeattendance/edit', 'EmployeeAttendanceController@showattendance');



Route::resource('/addcity','CityController');
Route::resource('/addarea','AreaController');
Route::resource('/addbranch','BranchController');
Route::resource('/addjob','JobController');
Route::any('/viewjobs', 'JobController@viewjobs');
Route::any('jobs/{id}/edit', 'JobController@edit');
Route::any('job/{id}', 'JobController@update');
Route::any('/viewbranch', 'BranchController@viewbranch');
Route::any('branch/fetchdata/{id}', 'BranchController@fetchbranch');
Route::any('branch/{id}', 'BranchController@update');
Route::any('branch/{id}/edit', 'BranchController@edit');
Route::any('delete/{id}', 'JobController@deletejob');
// Route::any('student/fetchdata/{id}', 'HRController@fetchstudent');
// Route::any('student/{id}/edit', 'HRController@edit');
// Route::any('student/{id}', 'HRController@update');


Route::any('employee/fetchdata/{id}', 'HRController@fetchemployee');
Route::any('employee/{id}/edit', 'HRController@editemployee');
Route::any('employee/{id}', 'HRController@updateemployee');
Route::any('/deleteemployee','HRController@deleteemployee');


Route::any('parent/fetchdata/{id}', 'HRController@fetchparent');
Route::any('parent/{id}/editparent' , 'HRController@editparent');
Route::any('/parent/{id}', 'HRController@updateparent');



Route::any('/viewstudents', 'HRController@viewstudent');
Route::any('/viewemployee', 'HRController@viewemployee');
Route::any('/parentinfo', 'HRController@viewparent');
Route::any('/job/fetch/{id}', 'HRController@fetch');



// =========================Admission Controller=============
Route::any('/student', 'AdmissionController@index');
Route::any('/addstudent', 'AdmissionController@addstudent');
// Route::any('/addstudent', 'AdmissionController@index');
Route::any('/viewstudents', 'AdmissionController@viewstudent');
Route::any('student/fetchdata/{id}', 'AdmissionController@fetchstudent');
Route::any('student/{id}/edit', 'AdmissionController@edit');
Route::any('student/{id}', 'AdmissionController@update');
// Route::any('/transferadd','AdmissionController@transferindex');
// Route::any('/transfer/create','AdmissionController@transfer');
Route::any('/school','AdmissionController@schoolleaving');
Route::any('/school/leaving','AdmissionController@schoolleave');
// Route::any('/viewemployee', 'HRController@viewemployee');

// Route::resource('/student', 'HRController');
//==================Accounts Controller===================
Route::resource('/fees','AccountsController');
Route::any('/fees/delete/{id}','AccountsController@delete');
Route::any('fees/fetchdata/{fee_id}', 'AccountsController@fetchfees');
Route::any('/fees/{id}/edit','AccountsController@edit');
// Route::any('/feesedit','AccountsController@edit');
Route::any('/feesedit','AccountsController@update');
// Route::any('/feesedit/{id}','AccountsController@update');

//update

//==================FEE Details Controller===================
Route::resource('/setfeesdetail', 'Fee_DetailsController');
Route::any('/generatechallan', 'AccountsController@generatechallan');
Route::resource('/searchclass', 'Fee_DetailsController');
// Route::resource('/fee_voucher/searchclass', 'Fee_DetailsController');
Route::any('/fee_detail/search', 'Fee_DetailsController@search');
Route::any('/generateChallan', 'Fee_DetailsController@GenerateFeeVocher');

Route::any('/fees/class/{id}','Fee_DetailsController@fetchstudent');
Route::any('/fee_voucher/searchclass','Fee_DetailsController@searchClass');
Route::any('/fee_voucher','Fee_DetailsController@FeeVoucher');
Route::any('fee/{id}/{date}/edit', 'Fee_DetailsController@editfee');
Route::any('fee/{id}/{date}', 'Fee_DetailsController@updateFee');
Route::any('/voucher/{id}/{feeid}', 'Fee_DetailsController@Voucher');


//updateFee
// Route::any('/view_detail/search', 'Fee_DetailsController@SearchFeeVoucher');

// Route::any('/generatechallan', 'AccountsController@addfees');


Route::any('/addfees', 'AccountsController@addfess');
// Route::any('/viewfees', 'AccountsController@viewfess');
Route::any('/feechallan', 'AccountsController@feechallan');
 //Route::any('/generatechallan', 'AccountsController@generatechallan');
Route::any('/generatechallan/bulk', 'AccountsController@bulk');
Route::any('/paymenthistory','AccountsController@paymenthistory');
Route::resource('/empsalary','EmployeeSalaryController');
Route::any('/ViewEmployeeSal','EmployeeSalaryController@viewEmployeeSalary');
//================= classes ===============
Route::resource('/class','StudentController');
Route::any('/createclass','StudentController@createclass');
Route::any('classes/fetchdata/{id}', 'StudentController@fetchclasses');
Route::any('/updateclass', 'StudentController@updateclass');

// ====================== Subject ========================
Route::any('/subjects','StudentController@subjectindex');
Route::any('/createsubjects','StudentController@createsubjects');
Route::any('subject/fetchdata/{id}', 'StudentController@fetchsubject');
Route::any('/updatesubject', 'StudentController@updatesubject');

//============ Assign Subject ======================
Route::any('/assign','StudentController@assignsubject');
Route::any('/assigned','StudentController@assigned');
Route::any('assign/subjectteacher/{id}', 'StudentController@subjectteacher');
//======================Parents=================================
Route::resource('/parents', 'ParentsController');
Route::any('/updaterequest/approved/{id}', 'CertificateController@approvestatus');
Route::any('/updaterequest/not-approved/{id}', 'CertificateController@notapprovestatus');
Route::resource('/applyforcert', 'CertificateController');
Route::any('/leavingcertificate', 'CertificateController@leavingindex');
Route::any('/viewpdf/{id}','CertificateController@certificate');
Route::get('/downloadPDF/{id}','CertificateController@downloadPDF');
Route::any('/attandance_view','ParentsController@attandanceView');
Route::any('/searchattandance_view','ParentsController@search');
Route::any('/result_view','ParentsController@resultView');
Route::any('/searchresult_view','ParentsController@searchresult');
Route::any('/lect_view','ParentsController@viewLecture');
Route::any('/lect_view/{id}','ParentsController@viewSubjectLecture');
Route::any('/timetable_view','ParentsController@viewtimetable');

Route::resource('/addroles','RolesController');
Route::any('/viewroles','RolesController@viewroles');
Route::any('/viewAppStatus','CertificateController@viewApplicationRequest');
Route::any('/accept', 'CertificateController@viewrequest');
// Route::resource('/addroles/create','RolesController');
// /accept/40/update




// ===================== Section ===========================
// Route::any('/createsection','StudentController@createsection');
// Route::any('/section','StudentController@sectionindex');
// Route::any('section/fetchdata/{id}', 'StudentController@fetchsection');
// Route::any('/updatesection', 'StudentController@updatesection');
Auth::routes();
Route::get('/logout' , function(){
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

// ============== Teacher ===============
Route::get('/new_lectures', function () {
    return view('Teachers.new_lectures');
});
Route::resource('/teacher','TeacherController');
Route::any('/view_lecture','TeacherController@view_lecture');

Route::get('/new_homework', function () {
    return view('Teachers.new_homework');
});
// Route::get('/new_syllabus', function () {
    //     return view('Teachers.mark_syllabus');
// });
Route::any('/homework','TeacherController@createhomework');
Route::any('resultadd','TeacherController@index');
Route::any('/addresult', 'TeacherController@createResult');
// Route::any('/markresult', 'TeacherController@markresult');
Route::any('/resultview','TeacherController@viewresultindex');

// showattendance
// Route::any('/createmarks', 'TeacherController@createmarks');
Route::any('/mark_attendance', 'TeacherController@markattendance');
// Route::any('/mark_attendance', 'TeacherController@markattendance');
Route::any('/mark_attendance/search', 'TeacherController@search');
Route::any('/mark_attendance/save_attendance', 'TeacherController@saveattendance');

Route::any('/resultview','TeacherController@viewresultindex');
// Route::any('/attendance/save_attendance', 'TeacherController@saveattendance');
Route::any('/attendance/view_attendance', 'TeacherController@show');
Route::any('/attendance/view_individual', 'TeacherController@showattendance');

Route::any('/attendance/edit', 'TeacherController@edit');
Route::any('/attendance/update', 'TeacherController@update');
Route::any('/createsyllabus', 'TeacherController@createsyllabus');
Route::any('/new_syllabus', 'TeacherController@showsyllabus');

//=================== student ===========================
Route::any('/check_homework','StudentController@homework');
Route::any('/check_lectures','StudentController@lectures');
Route::any('/check_syllabus','StudentController@syllabus');
Route::any('/result','StudentController@result');
Route::any('/getchallan','StudentController@getchallan');
Route::any('/status','StudentController@feestatus');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'StudentController@pdfview'));

//================== Examination ===========================
//  Route::any('/createtimetable', 'ExaminationController@createtimetable');
Route::any('/timetable','ExaminationController@timetable');
Route::any('/createtimetable', 'ExaminationController@createtimetable');

Route::any('/viewtimetable', 'ExaminationController@ViewTimetable');

Route::any('result/fetchdata/{id}', 'ExaminationController@fetchResult');
Route::any('result/{id}/edit', 'ExaminationController@editresult');
Route::any('result/{id}', 'ExaminationController@updateResult');
Route::resource('/classtimetable','ClassTimeTableController');
Route::any('/showclasstimetable', 'ClassTimeTableController@showclassTimetable');
// Route::any('/class/{id}/edit','ClassTimeTableController@edit');

// Route::resource('/classtimetable','ClassTimeTableController');
// Route::any('/deleteresult','HRController@deleteresult');

// Route::get('/exam_timetable', function () {
//     return view('Examination.timetable_exams');
// });
// // Route::any('/syllabus','ExaminationController@syllabus');
Route::any('/announceresult','ExaminationController@announceresult');
Route::any('/searchresult','ExaminationController@searchstudents');
// Route::any('/attendance/edit','ExaminationController@searchstudents');
Route::any('student/{id}/report', 'ExaminationController@makereport');
Route::any('generatereport/bulk', 'ExaminationController@updateresult');
//////////////////////////////Assign Role/////////////////////
Route::resource('/assignrole', 'UserSideBarController');
Route::resource('/roleassign', 'UserSideBarController');

