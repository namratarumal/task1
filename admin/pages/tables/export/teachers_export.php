<?php
include("../../../../config.php");
?>
<html>
<div class="table-responsive">
<h4 class="card-title" style="text-align:center;">Our Staff</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Position</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <?php 
                       // Excel file name for download 
$file="teacher.xls";
 
// Headers for download 
header("Content-Disposition: attachment; filename=\"$file\""); 
header("Content-Type: application/vnd.ms-excel"); 
                       $sql="select * from team";
                       $res=mysqli_query($con,$sql);
                       while($rw=mysqli_fetch_row($res))
                       {
                      ?>
                      <tbody>
                        <tr>
                            <td><?php echo $rw[0];?></td>
                            <td><?php echo $rw[1];?></td>
                            <td><img src="../forms/image/<?php echo $rw[2];?>"></td>
                            <td><?php echo $rw[3];?></td>
                            <td><a href="delete_teacher.php?id=<?php echo $rw[0];?>">Delete</a></td>
                            <td><a href="teacher_update.php?id=<?php echo $rw[0];?>">Update</a></td>
                        </tr>
                      </tbody>
                      <?php
                       }
                       ?>
                    </table>
                  </div>
                    </html>