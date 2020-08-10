<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.header')
  @toastr_css
</head>
<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        @include('layouts.topNav&Sidebar')
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Search Class</h3>
        <form method="POST" action="/fee_detail/search">
            @csrf
            <div class="row mt">

                @php
                $branch  = App\Classes::all(); 
               @endphp
                <div class="form-group">
                  <br>
                  <br>
                  <label class="col-lg-6 control-label">Class</label>
                  <br>
                  <div class="col-sm-10">
                    <select class="form-control" name="class_id" id="class_id">
                      <option ></option>
                      @foreach ($branch as $item)
                      <option value="{{$item->class_id}}">{{$item->class_name}}</option>
                      @endforeach
                        </select>
                   
                  </div>
                </div>
             
             
             
                {{-- <div class="col-lg-6">
                  <label class=" control-label">Select Class</label>
                    <select name="class_id" class="form-control">
                  <option></option>
                  @foreach ($students as $item)
                  <option value="{{$item->class_id}}">{{$item->class_name}}</option>
                  @endforeach
        
                    </select>
                  </div> --}}
                
                  
               
              </div>
              <br>
              
              <button type="submit"   class="btn btn-primary" >Search</button>
        </form>
        
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
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <script type="text/javascript">

    $(document).ready(function() {
   
       $("#class_id").change(function() {                
          var id=this.value;
          console.log(id)
         $.ajax({    //create an ajax request to display.php
           type: "GET",
           url: "/fee_detail/search",             
           dataType: "html",   //expect html to be returned                
           success: function(response){                    
               $("#responsecontainer").html(response); 
               //alert(response);
           }
   
       });
   });
   });
   
   </script>
   
  <!-- js placed at the end of the document so the pages load faster -->
  @include('layouts.scripts')
  @jquery
  @toastr_js
  @toastr_render
</body>

</html>
