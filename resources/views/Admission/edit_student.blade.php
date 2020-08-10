<!DOCTYPE html>
<html lang="en">

@include('layouts.header')
@toastr_css
<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('layouts.topNav&Sidebar')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Form Components</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
              @foreach ($student as $students)
                  
            <form class="form-horizontal style-form" method="POST" action="/student/{{$students->student_id}}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_name" value="{{$students->student_name}}">
                    </div>
                    @error('student_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Roll Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_roll_no" value="{{$students->student_roll_no}}">
                    </div>
                    @error('student_roll_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Father Name</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="father_name" value="{{$students->father_name}}">
                    </div>
                    @error('father_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Parent CNIC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="parent_cnic" value="{{$students->parent_cnic}}">
                    </div>
                    @error('parent_cnic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_email" value="{{$students->student_email}}">
                    </div>
                    @error('student_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="student_gender" value="{{$students->student_gender}}">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    @error('student_gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Date Of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="student_dob" value="{{$students->student_dob}}">
                    </div>
                    @error('student_dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Blood Group</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_blood_group" value="{{$students->student_blood_group}}">
                    </div>
                    @error('student_blood_group')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nationality</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="student_nationality" value="{{$students->student_nationality}}">
                    </div>
                    @error('student_nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Religion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_religion" value="{{$students->student_religion}}">
                    </div>
                    @error('student_religion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_address" value="{{$students->student_address}}">
                    </div>
                    @error('student_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_phone_number" value="{{$students->student_phone_number}}">
                    </div>
                    @error('student_phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="student_pic_path" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Admission Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="student_date_of_admission" value="{{$students->student_date_of_admission}}">
                    </div>
                    @error('student_date_of_admission')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Admission Class</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_class_of_admission" value="{{$students->student_class_of_admission}}">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Class Section</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_class_section" value="{{$students->student_class_section}}">
                    </div>
                    @error('student_class_section')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Previous School</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_previous_school" value="{{$students->student_previous_school}}">
                    </div>
                    @error('student_previous_school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Disability</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_disability" value="{{$students->student_disability}}">
                    </div>
                    @error('student_disability')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" value="{{$students->student_disability}}">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <input type="submit" class="btn btn-theme" value="Update">
            </form>
            @endforeach
        </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- INPUT MESSAGES -->
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="form_component.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  @include('layouts.scripts')
</body>
@jquery
@toastr_js
@toastr_render
</html>
