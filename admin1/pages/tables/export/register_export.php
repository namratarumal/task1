<?php
include("../../../../config.php");
?>
<html>
<div class="table-responsive">
<h4 class="card-title" style="text-align:center;">Student Registration Table</h4>
<table class="table table-striped">

  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      
      <th>Address</th>
      <th>Contact</th>
      <th>Qualification</th>
      <th>Profile</th>
    </tr>
  </thead>
  <?php 
 // Excel file name for download 
$file="registration.xls";
 
// Headers for download 
header("Content-Disposition: attachment; filename=\"$file\""); 
header("Content-Type: application/vnd.ms-excel"); 
   $sql="select * from registration";
   $res=mysqli_query($con,$sql);
   while($rw=mysqli_fetch_row($res))
   {
  ?>
  <tbody>
    <tr>
        <td><?php echo $rw[0];?></td>
        <td><?php echo $rw[1];?></td>
        <td><?php echo $rw[2];?></td>
        <td><?php echo $rw[5];?></td>
        <td><?php echo $rw[6];?></td>
        <td><?php echo $rw[7];?></td>
        <td><img src="../../../image/<?php echo $rw[8];?>"></td>
        
    </tr>
  </tbody>
  <?php
   }
   ?>
</table>
</div>
</html>