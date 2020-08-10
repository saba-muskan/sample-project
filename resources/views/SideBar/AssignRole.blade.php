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
                <style>
                    .topnav {
               background-color:darkcyan;
               overflow: hidden;
                }

                </style>
                <div class="topnav">
                    <h4 style="color: black;"class="mb"></i><b>Assign Roles</b></h4>
                    
                  </div>
              
            <br>
            <br>
                <form class="form-horizontal style-form" method="POST" action="/roleassign" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                  @php
                  $cl = App\User::all();
               @endphp
               <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">User</label>
                 <div class="col-sm-5" style="overflow:scroll; height:350px">
                    @foreach ($cl as $c)
                    <label class="checkbox">
                        <input type="checkbox" name="user_id" id={{$c->id}} value="{{$c->id}}">{{$c->name}}
                        </label>
                    @endforeach  
                 </div>
                 <div class="form-group">
                   <label class="col-sm-2 col-sm-2 control-label">Roles</label>
                   <div class="col-sm-5" style="overflow:scroll; height:350px">
                      @foreach ($roles as $role)
                      <label class="checkbox">
                          <input type="checkbox" name="role_id[]" value="{{$role->id}}">{{$role->Name}}
                          </label>
                      @endforeach  
                   </div>
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
@jquery
@toastr_js
@toastr_render
</html>
