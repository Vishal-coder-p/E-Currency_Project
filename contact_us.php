<?php
   require('top.inc.php');
      if(isset($_GET['type']) &&  $_GET['type']!=''){
         $type=get_safe_value($conn,$_GET['type']);
           if($type=='delete'){
            $id=get_safe_value($conn,$_GET['id']);
            $delete_status="delete  from contact_us where  id='$id'";
            mysqli_query($conn,$delete_status);
         }
   }
   $sql="select  *  from  contact_us order by id asc";
   $res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <span style="font-size:15px;"> Contact  Us</span>
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Comment</th>
                                       <th>Date</th>
                                       <th>Delete</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $id=1;
                                       while($row=mysqli_fetch_assoc($res)){
                                          ?>
                                       
                              
                                    <tr>
                                       <td class="serial"><?php echo  $id; ?></td>
                                       <td><?php  echo  $row['id']; ?></td>
                                       <td><?php echo  $row['name']; ?></td>
                                       <td><?php echo  $row['email']; ?></td>
                                       <td><?php echo  $row['mobile']; ?></td>
                                       <td><?php echo  $row['comment']; ?></td>
                                       <td><?php echo  $row['added_on']; ?></td>
                                       <td><?php
                                          echo  "<a  href='?type=delete&id=".$row['id']."'> <button class='btn btn-danger btn-sm'>Delete</button></a>";
                                           ?>
                                       </td>
                                       
                                    </tr>
                                    <?php 
                                       }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
        <?php
         require('footer.inc.php');
        ?>