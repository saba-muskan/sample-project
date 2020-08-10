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
<section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Employee Attendance</h3>
      <div class="row mb">
        <!-- page start-->
        <section class="wrapper">
         
          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">

                  <form class="form-horizontal style-form" method="POST" action="/Employeeattendancesearch/view_individual" accept-charset="UTF-8" enctype="multipart/form-data">
                      @csrf
                      
                      <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Search By Month</label>
                    <div class="col-sm-10">
                      <input type="month" placeholder="Search Here......." name="month">
                        {{-- <input type="text" class="form-control" name="city_name" required> --}}
                      </div>
                  </div>

                  @php
                  $cl = App\Employee::all();
              
               @endphp
               <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Employee</label>
                 <div class="col-sm-10">
                   <select name="employee_id" class="col-sm-2 col-sm-2" required>
                       <option></option>
                       @foreach ($cl as $c)
                       <option value="{{$c->employee_id}}">{{$c->employee_name}}</option>
                       
                       @endforeach
                   </select>
                   
                 </div>
               </div>
                 
          
                  <button type="submit" class="btn btn-theme">Submit</button>
              </form>
           
          </div>
          <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">

                  <form class="form-horizontal style-form" method="POST" action="/Employeeattendancesearchbydate/view_individual" accept-charset="UTF-8" enctype="multipart/form-data">
                      @csrf
                      
                      <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Search By Date</label>
                    <div class="col-sm-10">
                      <input type="date" placeholder="Search Here......." name="date">
                        {{-- <input type="text" class="form-control" name="city_name" required> --}}
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
       
       <section class="wrapper">
         <div class="content-panel">
           
          <div class="adv-table">
            <div class="row mt">
              <div class="col-lg-12">
                
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    
                    <th>Date</th>
                    
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                @foreach ($empattendence as $d)
                
                <tr class="gradeX">
                  
                  
                  <td>{{$d->date}}</td>
                  
                  <td>
                    @php
                    $today = \Illuminate\Support\Carbon::now()->format('Y-m-d');
                    @endphp
                  
                  @if($d->date == $today )
                  <div class="container-2">
                    <div class="btn btn-two">
                      
                      
                      <span>
                        <a href="/save_attendance/{{$d->date}}/edit"> <button class="btn btn-primary btn-xs"><i class=" fa fa-pencil"></i></button></a>
                            {{-- <button class="btn btn-outline-success" type="submit"><i class="fas fa-edit"></i></button> --}}
                          </span>                        
                          
                        </div>
                      </div>
                      @endif
                      <div class="container-2">
                        <div class="btn btn-two">
                          <form method="POST" action="/Employeeattendance/view_individual">
                            @csrf
                            {{-- <input type="hidden" name="student_id" value="{{$d->student_id}}"> --}}
                            <input type="hidden" name="date" value="{{$d->date}}">
                            <span>
                             
                      
                              <button class="btn btn-success btn-xs"><i class=" fa fa-eye"></i></button>
                       
                              {{-- <button class="btn btn-outline-success" type="submit"><i class="fas fa-eye"></i></button> --}}
                            </span>
                          
                          </form>
                        </div>
                      </div>
                      
                    </td>

                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
            </div>

          </div>
            </div>
          </div>
        </section>
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
  @include('layouts.scripts')
</body>

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
