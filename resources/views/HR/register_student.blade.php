<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

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
              <form class="form-horizontal style-form" method="POST" action="/addstudent" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="text" name="role_id" value="5" hidden>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Roll Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_roll_no">
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="email" class="col-sm-2 col-sm-2 control-label">{{ __('E-Mail Address') }}</label>

                  <div class="col-sm-10">
                      <input id="student_email" type="email" class="form-control @error('email') is-invalid @enderror" name="student_email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Gender</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="student_gender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Date Of Birth</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="student_dob">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Blood Group</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_blood_group">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nationality</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_nationality">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Religion</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_religion">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_address">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_phone_number">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_pic_path">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Admission Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="student_date_of_admission">
                  </div>
                </div>
                @php
                    $classes =  App\Classes::all();
                @endphp
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Admission Class</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="student_class_of_admission">
                    <option value=""></option>
                    @foreach ($classes as $item)
                    <option value="{{$item->class_id}}">{{$item->class_name}}</option>
                    @endforeach
                      </select>
                  </div>
                </div>
                @php
                   $section =  App\Classes::all();
                @endphp
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Class Section</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="student_class_section">
                    <option value=""></option>
                    @foreach ($section as $item)
                    <option value="{{$item->section}}">{{$item->section}}</option>
                    @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Previous School</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_previous_school">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Disability</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_disability">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 col-sm-2 control-label">{{ __('Password') }}</label>

                  <div class="col-md-10">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group">
                  <label for="password-confirm" class="col-sm-2 col-sm-2 control-label">{{__('Confirm Password') }}</label>

                  <div class="col-md-10">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>
              <label>Parents</label>
               
              

                
                <button type="submit" class="btn btn-theme">Submit</button>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- INPUT MESSAGES -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">

              <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
          <!-- CUSTOM TOGGLES -->
        </div>
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

</html>
