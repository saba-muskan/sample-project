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
              <form class="form-horizontal style-form" method="POST" action="/fees" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Class</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="class_id" required>
                        <option></option>
                        @php
                           $class = App\Classes::all();
                        @endphp
                            @foreach ($class as $classes)
                            <option value="{{$classes->class_id}}">{{$classes->class_name}}</option>
                            @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Branch</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="branch_id" required>
                        <option></option>
                        @php
                           $b = App\Branch::all();
                        @endphp
                            @foreach ($b as $branch)
                            <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                            @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Fee Type</label>
                  <div class="col-sm-10">
                    <select name="fee_type" class="form-control" required>
                        <option>Regular</option>
                        <option>Late</option>
                        <option>Annual</option>
                    </select>
                    
                  </div>
                </div>
          
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Annual Charges</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="annual_charges" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lab Charges</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lab">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tution Fees</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tution_fee">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Fee Of Year</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="year">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Late Charges</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="late_charges">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Fee Month</label>
                  <div class="col-sm-10">
                    <input type="month" class="form-control" name="month">
                  </div>
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
>
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
</body>
@jquery
@toastr_js
@toastr_render
</html>
