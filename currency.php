<?php
   require('top.inc.php');
   if(isset($_GET['type']) &&  $_GET['type']!=''){
      $type=get_safe_value($conn,$_GET['type']);
/*      if($type=='status'){
         //  after  that  we  get  value  for  storing  url  value  in  a  table
        $operation=get_safe_value($conn,$_GET['operation']);
         $id=get_safe_value($conn,$_GET['id']);
         if($operation=='active'){
            $status='1';
         }else{
            $status='0';
         }
       $update_status="update currencies set  status='$status' where  id='$id'";
       mysqli_query($conn,$update_status);
      }  */
      if($type=='delete'){
         $id=get_safe_value($conn,$_GET['id']);
         $delete_status="delete  from currencies where  id='$id'";
         mysqli_query($conn,$delete_status);
      }

   }
   $sql="select  *  from  currencies  order by currencyName asc";
   $res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <span style="font-size:15px;"> E-Currency</span>
                           <span style="margin-left:730px;"> <a href="manage_currency.php"> <button class="btn  btn-success">Add Currency </button> </a>  </span>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="avatar">ID</th>
                                       <th style="text-align:center;">Currency Name</th>
                                       <th style="text-align:center;">Buy</th>
                                       <th style="text-align:center;">Sell</th>
                                       <th style="text-align:center;">Link</th>
                                       <th style="text-align:center;">Logo</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $id=1;
                                       while($row=mysqli_fetch_assoc($res)){
                                          ?>
                                       
                              
                                    <tr>
                                       
                                       <td><?php  echo  $row['id']; ?></td>
                                       <td style="text-align:center;"><?php echo  $row['currencyName']; ?></td>
                                       <td style="text-align:center;"><?php echo  $row['Buy']; ?></td>
                                       <td style="text-align:center;"><?php echo  $row['Sell']; ?></td>
                                       <td style="text-align:center;"><?php echo  $row['link']; ?></td>
                                       <td style="text-align:center;"> <img  src='<?php echo  $row['c_logo']; ?>' height='30' width='100' /> </td>
                                       
                                       <td>
                                           <?php // if($row['status']==1){
                                            // echo  "<span class='badge badge-complete'><a  href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp";
                                         // }else{
                                           //  echo  "<span class='badge badge-pending'><a  href='?type=status&operation=active&id=".$row['id']."'>Decative</a></span>&nbsp";
                                         // }
                                          echo  "<a  href='manage_currency.php?id=".$row['id']."'><button class='btn btn-sm btn-primary'>Edit</button></a>";
                                          echo  "<a  href='?type=delete&id=".$row['id']."'> <button class='btn btn-sm btn-danger'> Delete </button></a>";
                                         
                                          
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