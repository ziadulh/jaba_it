<!DOCTYPE html>
<html>
<body style="size: landscape;">

<small style="background-color: black; color: white; top:0; left:0;">student copy</small>
<small style="background-color: black; color: white; top:0; left:0; float:right">Sl-st00{{$data['id']}}</small>
<p>Student name: {{$data->student['first_name']}} {{$data->student['last_name']}}</p>
<p>Student ID: {{$data->student['student_id']}}</p>
<p>Class: {{$data->student->info['class']}}</p>
<p>Section: {{$data->student->info['section']}}</p>
<p>Roll: {{$data->student->info['class']}}</p>
<p>Group: {{$data->student->info['group']}}</p>

<table style="width:100%">
  <tr>
    <td><b>Particular</b></td>
    <td><b>Amount</b></th> 
  </tr>
  <tr>
    <td>{{$data->fee['name']}}</td>
    <td>{{$data->fee['amount']}}</td>
  </tr>
  
</table>


----------------------------------------------------------------------------------------------------------------------------------------
<table style="width:100%">
  <tr>
    <td>Total</td>
    <td>{{$data->fee['amount']}}</td>
  </tr>
  
</table><p></p>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p></p>
<small style="background-color: black; color: white; top:0; left:0;">School copy</small>
<p>Student name: {{$data->student['first_name']}} {{$data->student['last_name']}}</p>
<p>Student ID: {{$data->student['student_id']}}</p>
<p>Class: {{$data->student->info['class']}}</p>
<p>Section: {{$data->student->info['section']}}</p>
<p>Roll: {{$data->student->info['class']}}</p>
<p>Group: {{$data->student->info['group']}}</p>

<table style="width:100%">
  <tr>
    <td><b>Particular</b></td>
    <td><b>Amount</b></th> 
  </tr>
  <tr>
    <td>{{$data->fee['name']}}</td>
    <td>{{$data->fee['amount']}}</td>
  </tr>
  
</table>


----------------------------------------------------------------------------------------------------------------------------------------
<table style="width:100%">
  <tr>
    <td>Total</td>
    <td>{{$data->fee['amount']}}</td>
  </tr>

  </table><p></p>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p></p>
<small style="background-color: black; color: white; top:0; left:0;">Bank copy</small>
<p>Student name: {{$data->student['first_name']}} {{$data->student['last_name']}}</p>
<p>Student ID: {{$data->student['student_id']}}</p>
<p>Class: {{$data->student->info['class']}}</p>
<p>Section: {{$data->student->info['section']}}</p>
<p>Roll: {{$data->student->info['class']}}</p>
<p>Group: {{$data->student->info['group']}}</p>

<table style="width:100%">
  <tr>
    <td><b>Particular</b></td>
    <td><b>Amount</b></th> 
  </tr>
  <tr>
    <td>{{$data->fee['name']}}</td>
    <td>{{$data->fee['amount']}}</td>
  </tr>
  
</table>


----------------------------------------------------------------------------------------------------------------------------------------
<table style="width:100%">
  <tr>
    <td>Total</td>
    <td>{{$data->fee['amount']}}</td>
  </tr>

</table>

</body>
</html>
