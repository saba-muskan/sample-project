
<!DOCTYPE html>
<html>
@include('layouts.header')

<body> 


    @include('layouts.topNav&Sidebar')
    <section id="main-content">
        <section class="wrapper">
    <div class="row mt">
        <div class="col-lg-12">
         <table class="table table-striped table-advance table-hover">
            <tr>
               <td>ID</td>
               <td>Name</td>
               <td>job</td>
               <td>Salary</td>
              
               
            </tr>
            @foreach ($users as $user)
            <tr>
               <td>{{ $user->id }}</td>
               <td>{{ $user->Ename }}</td>
               <td>{{ $user->job }}</td>
               <td>{{ $user->salary }}</td>
            </tr>
            @endforeach
         </table>
        </div>
        <!-- col-lg-12-->
      </div>
    
</form>
</section>
</section>
@include('layouts.scripts')
</body>
</html>