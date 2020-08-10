<!DOCTYPE html>

<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
           <span style="font-size:50px; font-weight:bold">Leaving Certificate</span>
           <br><br>
               
<p align="center">
    It is certified that <b>{{$user->student_name}}</b> D/O,/S/O <b>{{$user->father_name}}</b> is a bonafide student of this School. His/Her Date of birth per school record is <b>{{$user->student_dob}}.</b>  </p>
     I wish him/her a very bright future. This certificate is being issued upon the request of the parents student for whatever legal purpose it may serve.
</>
<br>
           {{-- <span style="font-size:25px"><i>This is to certify that</i></span>
           <br><br>
           <span style="font-size:30px"><b>$student.getFullName()</b></span><br/><br/>
           <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
           <span style="font-size:30px">$course.getName()</span> <br/><br/> --}}
           {{-- <span style="font-size:20px">with score of <b>$grade.getPoints()%</b></span> <br/><br/><br/><br/> --}}
       <br>
       <br>
            <div class="client left" >
             
                <p style="color:blue;text-align:left" >Issuane Date</p>
                <p style="text-align:left">The Best Public School</p>
              
            </div>
            <div class="client left">
             
                <p style="color:blue;text-align:right;margin-top: -65px;">Hod Signature</p>
                {{-- <p style="color:blue;text-align:right;margin-top: -55px;">Commander</p> --}}
                <br>
               
              
            </div>
           
            </div>
            
    </div>

    <br>
    
    
    </div>
    <button type="button" onclick="window.print()" class="btn btn-primary">Print</button>
</html>
         