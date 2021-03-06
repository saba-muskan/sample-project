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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Fee Voucher</h4>
              @foreach ($fee_detail as $fee)
                  
              <form class="form-horizontal style-form" method="PUT" action="/fee/{{$fee->student_id}}/{{$fee->due_date}}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Student Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_name" value="{{$stu->student_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Roll Number</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_roll_no" value="{{$stu->student_roll_no}}">
                    </div>
                </div> --}}
                {{-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Class</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="class_id" value="{{$class->class_name}}">
                    </div>
                </div> --}}
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Due Date</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="due_date" value="{{$fee->due_date}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fee Month</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="due_date" value="{{$fee->fee_month}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fee Month</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="current_ammount" value="{{$fee->current_ammount}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Arrears</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="arrears" value="{{$fee->arrears}}">
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fee Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="fee_status" value="{{$fee->fee_status}}">
                            <option>Paid</option>
                            <option>Unpaid</option>
                        </select>
                    </div>
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

</html>
