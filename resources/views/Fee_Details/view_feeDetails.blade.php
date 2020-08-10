<!DOCTYPE html>
<html lang="en">
  @toastr_css
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
@include('layouts.header')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    @include('layouts.topNav&Sidebar')
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Student Fee Details</h3>
        <div id="myDIV" class="row mb">
          <form class="example" id="form1" action="/generateChallan" method="POST" action="/addarea" accept-charset="UTF-8" enctype="multipart/form-data">
      
             
            {{-- <form class="form-horizontal style-form" > --}}
              @csrf
              <h3 align="center">Fee Details</h3>
              <div class="col-sm-3">
            <label class="col-sm-2 col-sm-2 control-label">Month</label>
            <div class="form-group">
                <input type="month" class="form-control" name="month">
              </div>
          </div>
          @php
          $cl = App\Fee::all();
                @endphp
                    <input type="hidden" name="class_id" value="{{$class_id}}">
       
                       @php
       $cl = App\Fee::all();
    @endphp
    <div class="col-sm-3">
      <label class="col-sm-2 col-sm-2 control-label">Fees</label>
      <div class="form-group">
        <select name="fee_id" class="form-control">
           
            @foreach ($cl as $c)
            <option value="{{$c->fee_id}}">{{$c->fee_type}}</option>
            
            @endforeach
        </select>
        
      </div>
    </div>

       {{-- <br> --}}
       {{-- <div class="row"> --}}
        <div style="padding-left: 20px;height: 250px;overflow:scroll;/* max-width: 250px; */" class="col-sm-3">
          {{-- <label class="col-sm-2 col-sm-2 control-label">Students</label> --}}
          @foreach ($student as $stu)
            <label class="checkbox">
              <input type="checkbox"  name="student_id[]" id="inlineCheckbox{{$stu->student_id}}" value="{{$stu->student_id}}">{{$stu->student_name}}
            </label>
          @endforeach
          
          </div>
       {{-- </div> --}}
     
      
        <div class="col-sm-3">
          <div class="form-group">
          <button type="submit" align="center" class="btn btn-theme">Submit</button>
        </div>
       
      </div>
       
      </form>
            {{-- <input type="text" placeholder="Enter Year" name="year"> --}}
           
          {{-- </form> --}}
        </div>
        <div  class="col-sm-3">
          <!-- page start-->
          <div class="form-group">
            <button type="button" class="btn btn-primary" id="formButton">Generate</button>
          </div>
        
          {{-- <button type="button" onclick="myFunction()" class="btn btn-primary" id="abc">Generate</button> --}}
       
        </div>
                  <script>
                   $(document).ready(function() {
                 $("#formButton").click(function() {
                  $("#form1").toggle();
                   });
                     });
                  </script>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" >
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Roll NO</th>
                    <th>Gender</th>
                    <th>Action</th>
                  
                    
                  </tr>
                </thead>
                {{-- <tbody>
                     {{-- <td>{{$student_id->student_name}}</td<td>{{$student_id-> --}- <td>{{$student_name->
                   
                         @foreach ($student as $stu)
                    <tr class="gradeX">
                        <td>{{$stu->student_name}}</td>
                        <td>{{$stu->father_name}}</td>
                        <td>{{$stu->student_roll_no}}</td>
                        <td>{{$stu->student_gender}}</td>
                        <td>{{$class->class_name}}</td> --}}
                      <td>  <button type="submit" class="btn btn-primary" id="abc">Edit</button></td>
                    </tr>
                    
                    {{-- @endforeach --}}
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
                        <h4 class="mb"><i class="fa fa-angle-right"></i>Branch</h4>
                        <div class="form-horizontal style-form">
                          @csrf
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label"> Branch Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="branch_name" id="branch_name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="address" id="address">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Area</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="area_id" id="area_id">
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
        <a href="advanced_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <style>
      #form1 {

display:none;

   }
  </style>
<script type="text/javascript">
   $("#abc").click(function(){
        $("#form1").toggle();
    });
</script>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      // sOut += '<tr><td>Parents:</td><td>' + aData[4] + ' ' + aData[5] + '</td></tr>';
      sOut += '<tr><td>Father Name:</td><td>' + aData[4] +'</td></tr>';
      sOut += '<tr><td>Mother Name:</td><td>' + aData[5] +'</td></tr>';
    //   sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    //   sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>
@jquery
@toastr_js
@toastr_render
</html>
