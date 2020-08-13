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
                  <th>Date</th>
                  <th>Class</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($data as $d)
                      
                  <tr class="gradeX">
                      <td>{{$d->date}}</td>
                      @php
                          $class = \App\Classes::all()->where('class_id' , $d->class_id)->first();
                      @endphp
                      <td>{{$class->class_name}}</td>
                      {{-- @foreach ($attendance as $attendances) --}}
                      {{-- <td>{{$d->date}}</td> --}}
                      <td>
                        @php
                        $today = \Illuminate\Support\Carbon::now()->format('Y-m-d');
                        // dd($today);
                        @endphp
                      
                        @if($d->date==$today)
                        <div class="container-2">
                          <div class="btn btn-two">
                            <form method="POST" action="/attendance/edit" >
                              @csrf
                              <input type="hidden" name="date" value="{{$d->date}}">
                              <span>
                                @php
                                $data=DB::table('roles')
                                ->where('id',Auth::user()->role_id)->first();
                                // dd($data);
                           @endphp
                            
                           @if($data->name=='Teacher')
                           
                            
                            
                            @php
                                $cl = App\Classes::all();
                                @endphp
                                <div class="form-group">
                                  <button class="btn btn-primary btn-xs d-inline"><i class=" fa fa-pencil"></i></button>
                                  
                                  <div class="col-sm-10">
                                    <label class="col-sm-2 col-sm-2 control-label">Class</label>
                                    <select ct name="class_id" class="form-control">
                                        <option></option>
                                        @foreach ($cl as $c)
                                        <option value="{{$c->class_id}}">{{$c->class_name}}</option>
                                        
                                        @endforeach
                                    </select>
                                   
                                    
                                  </div>
                                </div>
                                @endif
                           
                           
                                {{-- <button class="btn btn-outline-success" type="submit"><i class="fas fa-edit"></i></button> --}}
                                
                              </span>
                            
                            </form>
                          </div>
                        </div>
                        @endif
                      
                        <div class="container-2">
                          <div class="btn btn-two">
                            <form method="POST" action="/attendance/view_individual">
                              @csrf
                              {{-- <input type="hidden" name="student_id" value="{{$d->student_id}}"> --}}
                              
                              
                              <input type="hidden" name="date" value="{{$d->date}}">
                              <span>
                                @php
                                     $data=DB::table('roles')
                                     ->where('id',Auth::user()->role_id)->first();
                                    //  dd($data);
                                @endphp
                                 
                                @if($data->name=='Student')
                                <button class="btn btn-success btn-xs"><i class=" fa fa-eye"></i></button>
                                {{-- <button class="btn btn-outline-success" type="submit"><i class="fas fa-eye"></i></button> --}}
                              </span>
                              @endif
                              
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

