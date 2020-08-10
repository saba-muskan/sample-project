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
              <form class="form-horizontal style-form" method="POST" action="/assigned" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
            @php
                $subject = App\Subject::all();
            @endphp
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Subject</label>
              <div class="col-sm-10">
                <select class="form-control" name="subject_id">
                    <option></option>
                    @foreach ($subject as $subjects)        
                    <option value="{{$subjects->subject_id}}">{{$subjects->subject_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            @php
            $teacher = App\Employee::where('dept_id' , 1)->get();
            @endphp
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Teacher</label>
            <div class="col-sm-10">
                <select class="form-control" name="teacher_id">
                    <option></option>
                    @foreach ($teacher as $teachers)        
                    <option value="{{$teachers->employee_id}}">{{$teachers->employee_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
           <label class="col-sm-2 col-sm-2 control-label">Year</label>
           <div class="col-sm-10">
           <input type="text" name="year" class="form-control">
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
        <section id="main-content">
            <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> Advanced Table Example</h3>
              <div class="row mb">
                <!-- page start-->
                <div class="content-panel">
                  <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                      <thead>
                        <tr>
                          <th>Subject</th>
                          <th>Teacher</th>
                          <th>Year</th>
                          <th class="hidden-phone">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($subjectteacher as $subjectteachers)
                              
                          <tr class="gradeX">
                              <td>{{$subjectteachers->subject_name}}</td>
                              <td>{{$subjectteachers->employee_name}}</td>
                              <td>{{$subjectteachers->year}}</td>
                              <td>
                              {{-- <button type="submit" class="btn btn-primary btn-xs viewBtn" data-toggle="modal" data-target="#myModal" id="{{$subjectteachers->subject_id}}"><i class="fa fa-pencil"></i></button> --}}
                                {{-- <a href="employee/{{$class->id}}/edit"><button class="btn btn-primary btn-xs"><i class=" fa fa-pencil"></i></button></a> --}}
                                  <button class="btn btn-danger btn-xs"><i class=" fa fa-trash-o"></i></button>
                              </td>
                          </tr>
                          
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- page end-->
              </div>
              <div class="container">
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-panel">
                              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                              <form class="form-horizontal style-form" method="POST" action="/updateclass" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Class Name</label>
                                  <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="class_id" id="class_id">
                                    <input type="text" class="form-control" name="class_name" id="class_name">
                                  </div>
                                </div>                                
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Class Name</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="section" id="section">
                                  </div>
                                </div>                                
                                <button type="submit" class="btn btn-theme">Update</button>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
              <!-- /row -->
            </section>
            <!-- /wrapper -->
          </section>
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
{{-- <script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  }); 
  $(document).on('click','.viewBtn',function(){
    var id = $(this).attr('id');
      $.ajax({
      url: 'assign/subjectteacher/'+ id ,
      method:'GET',
      dataType:'json',
      success:function(data)
      {
          // console.log(data);
        
      //   $('#user_id').val(data[0].id); 
        $('#subject_teacher_id').val(data[0].id);  
        $('#subject_name').val(data[0].section);  
        $('#class_name').val(data[0].class_name);  
        $('#class_name').val(data[0].class_name);  
        // var a = $("#dept_id").val();
        // var dept_id = data[0].dept_id;
        // console.log(a,dept_id);
        // if(a == dept_id){
        //     $("#dept_id").selectedInde();
        // }
        // $('#dept_id').append("<option selected>"+data[0].name+"</option>"); 
        // $('#password').val(data[0].password); 
        
        
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

</script> --}}
