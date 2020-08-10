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
                
                <h4 class="mb"><i class="fa fa-angle-right"></i>Create Result</h4>
                
                <form class="form-horizontal style-form" method="POST" action="/addresult" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                   

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Year</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="year" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Exam</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="exam" required>
                            <option>Mid-Term</option>
                            <option>Final-Term</option>
                        </select>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status Report</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="status_report" required>
                    </div>
                </div>
               
                @php
                $cl = App\Subject::all();
             @endphp
             <div class="form-group">
               <label class="col-sm-2 col-sm-2 control-label">Subject</label>
               <div class="col-sm-10">
                 <select name="subject_id" class="form-control" required>
                     <option></option>
                     @foreach ($cl as $c)
                     <option value="{{$c->subject_id}}">{{$c->subject_name}}</option>
                     
                     @endforeach
                 </select>
                 
               </div>
             </div>
             
           
                
             <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Promoted</label>
                <div class="col-sm-10">
                    <select class="form-control" name="promoted" required>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>
             @php
             $cl = App\Student::all();
          @endphp
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Student</label>
            <div class="col-sm-10">
              <select name="student_id" class="form-control" required>
                  <option></option>
                  @foreach ($cl as $c)
                  <option value="{{$c->student_id}}">{{$c->student_name}}</option>
                  
                  @endforeach
              </select>
              
            </div>
              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Total Marks</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="marks" required>
                  </div>
                </div>
                
              
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Obtained Marks</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="obtain_marks" required>
                    </div>
            
               
                <button type="submit" class="btn btn-theme">Submit</button>
            </form>
         
        </div>
        <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- INPUT MESSAGES -->

        <!-- /row -->
      
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
  @jquery
  @toastr_js
  @toastr_render
</body>

</html>
