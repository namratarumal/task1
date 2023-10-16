<?php
include("../../../../config.php");
?>
<html>
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title" style="text-align:center;">Fees Table</h4>
    
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>Paid Fees </th>
            <th>Total Fees</th>
          </tr>
        </thead>
        <?php 
         // Excel file name for download 
        $file="fees.xls";
        
        // Headers for download 
        header("Content-Disposition: attachment; filename=\"$file\""); 
        header("Content-Type: application/vnd.ms-excel"); 
         $sql="select * from student_details inner join fees_table on student_details.sid=fees_table.sid inner join registration on  student_details.sid=registration.id";
         $res=mysqli_query($con,$sql);
         while($rw=mysqli_fetch_row($res))
         {
        ?>
        <tbody>
          <tr>
              <td><?php echo $rw[0];?></td>
              <td><?php echo $rw[12];?></td>
              <td><?php echo $rw[9];?></td>
              <td><?php echo $rw[4];?></td>
             
          </tr>
        </tbody>
        <?php
         }
         ?>
      </table>
    </div>
  </div>
</div>
</div>
        </html>