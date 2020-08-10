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
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tranfer Employee </h4>
              <form class="form-horizontal style-form" method="POST" action="/transfer/create" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                @php
                $st = App\Employee::all();
             @endphp
<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">Employee Name</label>
  <div class="col-sm-10">
    <select name="employee_id" class="form-control">
      <option></option>
      @foreach ($st as $c)
      <option value="{{$c->employee_id}}">{{$c->employee_name}}</option>
      @endforeach
  </select>

</div>
</div>
               

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Transfer Request</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="transfer_Reqdate">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Reason</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Reason">
                  </div>
                </div>

                @php
                $branch  = App\Branches::all(); 
               @endphp

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">From Campus</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="From_Campus">
                      <option value=""></option>
                      @foreach ($branch as $item)
                      <option value="{{$item->branch_id}}">{{$item->branch_name}}</option>
                      @endforeach
                        </select>
                    {{-- <input type="text" class="form-control" name="From_Campus"> --}}
                  </div>
                </div>
                @php
                $branch  = App\Branches::all(); 
               @endphp
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">To Campus</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="To_Campus">
                      <option value=""></option>
                      @foreach ($branch as $item)
                      <option value="{{$item->branch_id}}">{{$item->branch_name}}</option>
                      @endforeach
                        </select>
                   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Transfer Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="transfer_date">
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
