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
<form class="form-horizontal style-form" id="signupForm" method="POST" action="/addemployee" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <style>
                   .img{
                       max-width:180px;
                         }
                      input[type=file]{
                             padding:10px;
                         background:#2d2d2d;}
                    </style>
                      
                <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                <p><input type="file"  accept="image/*" name="Image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
                 <div class="border border-danger" align="right"><img id="output" width="200" /></div>
                 <script>
                 var loadFile = function(event) {
                   var image = document.getElementById('output');
                  image.src = URL.createObjectURL(event.target.files[0]);
             };
                    </script>
                 
        
                    <div class="form-group">
                  <label class="col-sm-2  control-label">Name</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="employee_name" value="{{old('employee_name')}}">
                      @error('employee_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                </div>
                  
                @php
                   $cl = App\Role::all();
                @endphp
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Department</label>
                  <div class="col-sm-10">
                    <select name="employee_designation" id="employee_designation" class="form-control input-lg">
                        <option></option>
                        @foreach ($cl as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        
                        @endforeach
                    </select>
                    @error('employee_designation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                </div>

                {{-- @php
                   $cl = App\Job::all();
                @endphp --}}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Designation</label>
                  <div class="col-sm-10">
                    <select name="job_id" id="job_id" class="form-control input-lg" >

                    </select>
                    @error('employee_designation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                 
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required class="@error('employee_address') is-invalid @enderror" value="{{old('employee_address')}}" name="employee_address">
                        @error('employee_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                </div>
                
                @php
                $cl = App\Branch::all();
            
             @endphp
             <div class="form-group">
               <label class="col-sm-2 col-sm-2 control-label">Branch</label>
               <div class="col-sm-10">
                 <select name="branch_id" class="form-control">
                     <option></option>
                     @foreach ($cl as $c)
                     <option value="{{$c->branch_id}}">{{$c->branch_name}}</option>
                     
                     @endforeach
                 </select>
                 @error('branch_id')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>
             @enderror
               </div>
             </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="employee_email" value="{{old('employee_email')}}" >
                      @error('employee_email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="employee_gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        @error('employee_gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">CNIC</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="employee_cnic" required>
                      @error('employee_cnic')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Martial Status</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="marital_status" required>
                          <option>single</option>
                          <option>married</option>
                      </select>
                      @error('marital_status')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="employee_phone_number" value="{{old('employee_phone_number')}}">
                        @error('employee_phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hire date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="employee_hireDate" value="{{old('employee_phone_number')}}">
                        @error('employee_hireDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Date Of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="employee_dob" value="{{old('employee_dob')}}">
                        @error('employee_dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Department</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="department" value="{{old('department')}}" >
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" value="{{old('password')}}">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
                </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Qualification</label>
                <div class="col-sm-10">
                  <select name="Qualification" class="form-control" required>
                      <option>Matric</option>
                      <option>Inter</option>
                      <option>Bachelor's</option>
                      <option>Masters </option>
                      <option>PHD</option>
                  </select>
                  @error('Qualification')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
              </div>
          
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Attachments</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="Attachments" multiple  required>
                @error('Attachments')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
$(document).ready(function(){

$('#employee_designation').change(function(){
 if($(this).val() != '')
 {
  var value = $(this).val();
  
  console.log(value);
  // debugger;
  $.ajax({
   url:'/job/fetch/'+value,
   method:"GET",
   dataType:'json',
  //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')}, 
   success:function(data)
   {
     console.log(data);
    //  debugger;
    var a = data.length;
    for(var i=0; i<a;i++)
    {
      $('#job_id').append("<option value='"+data[i].job_id+"'>"+data[i].job_Name+"</option>")
    }
   },
   error:function(e){
    //  debugger;
    console.log(e);
   }

  })
 }
});
});

</script>
  <!-- js placed at the end of the document so the pages load faster -->
  @include('layouts.scripts')
  
</body>

</html>
