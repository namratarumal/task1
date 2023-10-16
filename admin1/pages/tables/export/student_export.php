
<?php
include("../../../../config.php");
?>
<html>
<div class="table-responsive">
<h4 class="card-title" style="text-align:center;">Student Details</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Student Name</th>
                          <th>Course_Name</th>
                          
                          <th>Duration</th>
                          <th>Fees</th>
                          <th>Fees details</th>
                          
                        </tr>
                      </thead>
                      <?php 
                       // Excel file name for download 
$file="student_details.xls";
 
// Headers for download 
header("Content-Disposition: attachment; filename=\"$file\""); 
header("Content-Type: application/vnd.ms-excel"); 
                       $sql="select * from student_details inner join registration on student_details.sid=registration.id inner join basic_course on student_details.course_name=basic_course.id";
                       $res=mysqli_query($con,$sql);
                       while($rw=mysqli_fetch_row($res))
                       {

                      ?>
                      <tbody>
                        <tr>
                            <td><?php echo $rw[0];?></td>
                            <td><?php echo $rw[7];?></td>
                            <td><?php echo $rw[17];?></td>
                            <td><?php echo $rw[3];?></td>
                            <td><?php echo $rw[4];?></td>
                            <td><a href="fees_details.php?id=<?php echo $rw[1];?>">view</a></td>
                        </tr>
                      </tbody>
                      <?php
                       }
                       ?>
                    </table>
                  </div>
                    </html>