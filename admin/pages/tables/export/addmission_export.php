<?php
include("../../../../config.php");
?>
<html>
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title" style="text-align:center;">Addmission Table</h4>
    
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>Batch Name</th>
            <th>Batch Time</th>
            <th>Delete</th>
            <th>Update</th>
          </tr>
        </thead>
        <?php 
        // Excel file name for download 
        $file="Addmission.xls";
        
        // Headers for download 
        header("Content-Disposition: attachment; filename=\"$file\""); 
        header("Content-Type: application/vnd.ms-excel"); 
         $sql="select * from addmission inner join registration on addmission.sid=registration.id inner join batch on addmission.batchid=batch.course_id inner join basic_course on addmission.batchid=basic_course.id";
         $res=mysqli_query($con,$sql);
         while($rw=mysqli_fetch_row($res))
         {
         
        ?>
        <tbody>
          <tr>
              <td><?php echo$rw[0];?></td>
              <td><?php echo $rw[4];?></td>
              <td><?php echo $rw[21];?></td>
              <td><?php echo $rw[14];?></td>
              <td><a href="addmission_delete.php?id=<?php echo $rw[0];?>">Delete</a></td>
              <td><a href="addmission_update.php?id=<?php echo $rw[0];?>">Update</a></td>
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