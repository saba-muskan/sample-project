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
      <h3><i class="fa fa-angle-right"></i> Advanced Table Example</h3>
      <div class="row mb">
        <!-- page start-->
        <div class="content-panel">
          <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                  <th>Employee_Id</th>
                  <th>Date</th>
                  <th>status</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
              <tbody>
                  @foreach ($data as $d)
                      
                  <tr class="gradeX">
                    <td>{{$d->employee_id}}</td>
                    
                    <td>{{$d->date}}</td>
                    <td>
                        @php
                            $a=1;
                        @endphp
                        <form  method="POST" action="/Employeeattendance/update">
                            @csrf
                            <input type="hidden" name="employee_id[]"  value="{{$d->employee_id}}">
                            {{-- <input type="hidden" name="employee_id" value="{{$d->status}}"> --}}
                            <div class="form-check">
                                <label class="form-check-label" for="radio1">
                                  <input {{$d->status == 'present' ? 'checked' : '' }} name="status[]" type="radio" class="radio_btn form-check-input"  value="present" >Present
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label" for="radio2">
                                  <input {{$d->status == 'absent' ? 'checked' : '' }} name="status[]" type="radio" class="radio_btn form-check-input"  value="absent">Absent
                                </label>
                              </div>
                              
                  <td>
                      <button  type="submit" class="btn btn-primary fa fa-pencil"></button>
                  </td>
     

                        </form>
                           
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
