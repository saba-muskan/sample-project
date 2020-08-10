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
              @foreach ($data as $d)
                  
              <form class="form-horizontal style-form" method="POST" action="classtimetable/{{$d->class_id}}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
              @php
                $class = App\Classes::all();
             @endphp
             <div class="form-group">
               <label  class="col-sm-2 col-sm-2 control-label">Class</label>
               <div class="col-sm-10">
                 <select name="class_id" value="{{$d->class_id}}" class="form-control">
                     <option></option>
                     @foreach ($class as $c)
                     <option value="{{$c->class_id}}">{{$c->class_name}}</option>
                     
                     @endforeach
                 </select>
                 
               </div>
             </div>
             @php
             $class = App\Subject::all();
          @endphp
          <div class="form-group">
            <label  class="col-sm-2 col-sm-2 control-label">Subject</label>
            <div class="col-sm-10">
              <select name="subject_id" value="{{$d->subject_id}}" class="form-control">
                  <option></option>
                  @foreach ($class as $c)
                  <option value="{{$c->subject_id}}">{{$c->subject_name}}</option>
                  
                  @endforeach
              </select>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Year</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="year" value="{{$d->year}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Period No</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="period_no" value="{{$d->period_no}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Room No</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="Room_No" value="{{$d->Room_No}}">
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
