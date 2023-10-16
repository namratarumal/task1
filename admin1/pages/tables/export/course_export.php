<?php
include("../../../../config.php");
?>
<html>
<h4 class="card-title" style="text-align:center;">Course List</h4>
<table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Batch Id</th>
                          <th>Batch Time</th>
                         
                          <th>Start Date</th>
                         
                          <th>Fees</th>
                          <th>Faculty</th>
                          <th>Duration</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <?php 
                      $file="course.xls";
 
                      // Headers for download 
                      header("Content-Disposition: attachment; filename=\"$file\""); 
                      header("Content-Type: application/vnd.ms-excel"); 
                       $sql="select * from batch inner join basic_course on batch.course_id=basic_course.id";
                       $res=mysqli_query($con,$sql);
                       while($rw=mysqli_fetch_row($res))
                       {
                      ?>
                      <tbody>
                        <tr>
                            <td><?php echo $rw[0];?></td>
                            <td><?php echo $rw[9];?></td>
                            <td><?php echo $rw[2];?></td>
                            <td><?php echo $rw[3];?></td>
                            <td><?php echo $rw[4];?></td>
                            <td><?php echo $rw[5];?></td>
                            <td><?php echo $rw[6];?></td>
                           
                            <td><a href="batch_delete.php?id=<?php echo $rw[0];?>">Delete</a></td>
                            <td><a href="batch_update.php?id=<?php echo $rw[0];?>">Update</a></td>
                        </tr>
                      </tbody>
                      <?php
                       }
                       ?>
                    </table>
                    </html>