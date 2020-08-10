<!DOCTYPE html>
<html>
@include('layouts.header')

<body> 


    @include('layouts.topNav&Sidebar')
    <section id="main-content">
        <section class="wrapper">
    <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
            <form class="form-horizontal style-form" method="Post" action="/employees">
                @csrf
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Ename</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="Ename">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">job</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="job">
                  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Salary</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control round-form" name="salary">
                </div>
              </div>
              <button type="submit" class="btn btn-round btn-success">Add </button>
            </form>
          </div>
        </div>
        <!-- col-lg-12-->
      </div>
    
</form>
</section>
</section>
@include('layouts.scripts')
</body>
</html>